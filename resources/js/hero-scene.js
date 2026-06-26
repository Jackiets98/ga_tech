import * as THREE from 'three';

export function initHeroScene(container) {
    if (!container) return null;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return null;

    const isMobile = window.innerWidth < 768;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(
        50,
        container.clientWidth / container.clientHeight,
        0.1,
        100
    );
    camera.position.set(0, 2, 12);

    const renderer = new THREE.WebGLRenderer({ antialias: !isMobile, alpha: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, isMobile ? 1.5 : 2));
    container.appendChild(renderer.domElement);

    scene.fog = new THREE.FogExp2(0x0f172a, 0.035);

    const ambient = new THREE.AmbientLight(0xffffff, 0.4);
    scene.add(ambient);

    const keyLight = new THREE.DirectionalLight(0xf97316, 1.2);
    keyLight.position.set(5, 8, 6);
    scene.add(keyLight);

    const fillLight = new THREE.DirectionalLight(0x3b82f6, 0.4);
    fillLight.position.set(-6, 2, -4);
    scene.add(fillLight);

    const packages = [];
    const packageConfigs = isMobile
        ? [
            { pos: [3.5, 0.5, -2], size: [1.2, 0.8, 0.8], speed: 0.3 },
            { pos: [-3, -0.5, 0], size: [1.5, 1, 1], speed: 0.25 },
            { pos: [1, 1.5, -4], size: [0.9, 0.9, 0.9], speed: 0.35 },
        ]
        : [
            { pos: [4.5, 0.8, -1], size: [1.4, 0.9, 0.9], speed: 0.3 },
            { pos: [-4, -0.3, 1], size: [1.8, 1.2, 1.2], speed: 0.22 },
            { pos: [2, 2, -3], size: [1, 1, 1], speed: 0.28 },
            { pos: [-2.5, 1.2, -5], size: [1.3, 0.7, 0.7], speed: 0.32 },
            { pos: [5, -1, -4], size: [1.6, 1, 1], speed: 0.26 },
            { pos: [-5.5, 0.5, -3], size: [1.1, 1.1, 1.1], speed: 0.34 },
        ];

    packageConfigs.forEach(({ pos, size, speed }) => {
        const pkg = createPackage(size);
        pkg.position.set(...pos);
        pkg.userData = {
            baseY: pos[1],
            speed,
            phase: Math.random() * Math.PI * 2,
            rotSpeed: (Math.random() - 0.5) * 0.008,
        };
        scene.add(pkg);
        packages.push(pkg);
    });

    const routePoints = packages.map(p => p.position.clone());
    const routes = createRoutes(routePoints, isMobile);
    routes.forEach(route => scene.add(route));

    const particleCount = isMobile ? 80 : 200;
    const particles = createParticles(particleCount);
    scene.add(particles);

    const globe = createGlobeWireframe();
    globe.position.set(isMobile ? 2 : 5, isMobile ? -1 : 0, -8);
    scene.add(globe);

    let mouseX = 0;
    let mouseY = 0;
    let targetMouseX = 0;
    let targetMouseY = 0;
    let animationId = null;
    let isVisible = true;
    const clock = new THREE.Clock();

    function onMouseMove(e) {
        targetMouseX = (e.clientX / window.innerWidth - 0.5) * 2;
        targetMouseY = (e.clientY / window.innerHeight - 0.5) * 2;
    }

    if (!isMobile) {
        window.addEventListener('mousemove', onMouseMove, { passive: true });
    }

    function onVisibilityChange() {
        isVisible = !document.hidden;
        if (isVisible && !animationId) animate();
    }
    document.addEventListener('visibilitychange', onVisibilityChange);

    function onResize() {
        const w = container.clientWidth;
        const h = container.clientHeight;
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
        renderer.setSize(w, h);
    }
    window.addEventListener('resize', onResize, { passive: true });

    function animate() {
        animationId = requestAnimationFrame(animate);
        if (!isVisible) {
            animationId = null;
            return;
        }

        const elapsed = clock.getElapsedTime();

        mouseX += (targetMouseX - mouseX) * 0.05;
        mouseY += (targetMouseY - mouseY) * 0.05;

        packages.forEach(pkg => {
            const { baseY, speed, phase, rotSpeed } = pkg.userData;
            pkg.position.y = baseY + Math.sin(elapsed * speed + phase) * 0.35;
            pkg.rotation.y += rotSpeed;
            pkg.rotation.x = Math.sin(elapsed * speed * 0.5 + phase) * 0.08;
        });

        routes.forEach((route, i) => {
            route.material.opacity = 0.15 + Math.sin(elapsed * 0.8 + i) * 0.1;
        });

        particles.rotation.y = elapsed * 0.02;
        globe.rotation.y = elapsed * 0.08;

        camera.position.x = mouseX * 0.8;
        camera.position.y = 2 + mouseY * 0.4;
        camera.lookAt(0, 0, 0);

        renderer.render(scene, camera);
    }

    animate();

    return () => {
        cancelAnimationFrame(animationId);
        window.removeEventListener('mousemove', onMouseMove);
        window.removeEventListener('resize', onResize);
        document.removeEventListener('visibilitychange', onVisibilityChange);
        renderer.dispose();
        container.removeChild(renderer.domElement);
    };
}

function createPackage(size) {
    const group = new THREE.Group();
    const [w, h, d] = size;

    const bodyGeo = new THREE.BoxGeometry(w, h, d);
    const bodyMat = new THREE.MeshPhysicalMaterial({
        color: 0x1e293b,
        metalness: 0.3,
        roughness: 0.6,
        transparent: true,
        opacity: 0.85,
    });
    const body = new THREE.Mesh(bodyGeo, bodyMat);
    group.add(body);

    const edges = new THREE.EdgesGeometry(bodyGeo);
    const lineMat = new THREE.LineBasicMaterial({ color: 0xf97316, transparent: true, opacity: 0.9 });
    const wireframe = new THREE.LineSegments(edges, lineMat);
    group.add(wireframe);

    const stripeGeo = new THREE.BoxGeometry(w * 1.01, h * 0.08, d * 1.01);
    const stripeMat = new THREE.MeshBasicMaterial({ color: 0xea580c, transparent: true, opacity: 0.7 });
    const stripe = new THREE.Mesh(stripeGeo, stripeMat);
    stripe.position.y = h * 0.15;
    group.add(stripe);

    return group;
}

function createRoutes(points, isMobile) {
    const routes = [];
    const connections = isMobile ? [[0, 1], [1, 2]] : [[0, 1], [1, 2], [2, 3], [3, 4], [4, 5], [0, 3], [1, 4]];

    connections.forEach(([a, b]) => {
        if (!points[a] || !points[b]) return;

        const start = points[a].clone();
        const end = points[b].clone();
        const mid = start.clone().add(end).multiplyScalar(0.5);
        mid.y += 1.5 + Math.random() * 0.5;

        const curve = new THREE.QuadraticBezierCurve3(start, mid, end);
        const geo = new THREE.BufferGeometry().setFromPoints(curve.getPoints(32));
        const mat = new THREE.LineBasicMaterial({
            color: 0x60a5fa,
            transparent: true,
            opacity: 0.25,
        });
        routes.push(new THREE.Line(geo, mat));
    });

    return routes;
}

function createParticles(count) {
    const positions = new Float32Array(count * 3);
    for (let i = 0; i < count; i++) {
        positions[i * 3] = (Math.random() - 0.5) * 30;
        positions[i * 3 + 1] = (Math.random() - 0.5) * 20;
        positions[i * 3 + 2] = (Math.random() - 0.5) * 20;
    }

    const geo = new THREE.BufferGeometry();
    geo.setAttribute('position', new THREE.BufferAttribute(positions, 3));

    const mat = new THREE.PointsMaterial({
        color: 0xf97316,
        size: 0.04,
        transparent: true,
        opacity: 0.6,
        sizeAttenuation: true,
    });

    return new THREE.Points(geo, mat);
}

function createGlobeWireframe() {
    const group = new THREE.Group();
    const geo = new THREE.IcosahedronGeometry(2.2, 2);
    const wireMat = new THREE.MeshBasicMaterial({
        color: 0x334155,
        wireframe: true,
        transparent: true,
        opacity: 0.25,
    });
    const globe = new THREE.Mesh(geo, wireMat);
    group.add(globe);

    const ringGeo = new THREE.TorusGeometry(2.8, 0.015, 8, 64);
    const ringMat = new THREE.MeshBasicMaterial({ color: 0xf97316, transparent: true, opacity: 0.4 });
    const ring = new THREE.Mesh(ringGeo, ringMat);
    ring.rotation.x = Math.PI / 2.5;
    group.add(ring);

    return group;
}
