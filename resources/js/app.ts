import './bootstrap';

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

async function initReveals(): Promise<void> {
    const revealItems = Array.from(document.querySelectorAll<HTMLElement>('[data-reveal]'));

    if (prefersReducedMotion) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            },
            {
                rootMargin: '0px 0px -14% 0px',
                threshold: 0.08,
            },
        );

        revealItems.forEach((item) => {
            item.classList.add('reveal-ready');
            observer.observe(item);
        });
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }

    const parallaxItems = Array.from(document.querySelectorAll<HTMLElement>('[data-parallax]'));

    if (parallaxItems.length === 0) {
        return;
    }

    const { default: gsap } = await import('gsap');
    const { ScrollTrigger } = await import('gsap/ScrollTrigger');

    gsap.registerPlugin(ScrollTrigger);

    parallaxItems.forEach((item) => {
        const depth = Number(item.dataset.parallax ?? 0.12);
        gsap.to(item, {
            yPercent: depth * 100,
            ease: 'none',
            scrollTrigger: {
                trigger: item.parentElement ?? item,
                scrub: true,
                start: 'top top',
                end: 'bottom top',
            },
        });
    });
}

function initPortfolioFilters(): void {
    document.querySelectorAll<HTMLElement>('[data-portfolio-filters]').forEach((filterGroup) => {
        const buttons = Array.from(filterGroup.querySelectorAll<HTMLButtonElement>('[data-filter]'));
        const grid = filterGroup.parentElement?.querySelector<HTMLElement>('[data-portfolio-grid]')
            ?? document.querySelector<HTMLElement>('[data-portfolio-grid]');

        if (!grid) {
            return;
        }

        const cards = Array.from(grid.querySelectorAll<HTMLElement>('[data-category]'));

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                const activeFilter = button.dataset.filter ?? 'all';

                buttons.forEach((item) => {
                    const selected = item === button;
                    item.classList.toggle('active', selected);
                    item.setAttribute('aria-pressed', String(selected));
                });

                cards.forEach((card) => {
                    const show = activeFilter === 'all' || card.dataset.category === activeFilter;
                    card.hidden = !show;
                });
            });
        });
    });
}

function runEnhancement(task: () => Promise<void>): void {
    void task().catch(() => {
        // Keep the Blade-rendered page usable if a progressive enhancement is interrupted.
    });
}

async function initTableViewer(): Promise<void> {
    const container = document.querySelector<HTMLElement>('[data-table-viewer]');

    if (!container) {
        return;
    }

    const THREE = await import('three');
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(38, 1, 0.1, 100);
    camera.position.set(0, 2.2, 6.8);

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.8));
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);
    container.classList.add('viewer-ready');

    const group = new THREE.Group();
    scene.add(group);

    const woodMaterial = new THREE.MeshStandardMaterial({
        color: 0xb98a5a,
        roughness: 0.68,
        metalness: 0.03,
    });
    const darkWoodMaterial = new THREE.MeshStandardMaterial({
        color: 0x5b3824,
        roughness: 0.82,
        metalness: 0,
    });
    const steelMaterial = new THREE.MeshStandardMaterial({
        color: 0x171412,
        roughness: 0.48,
        metalness: 0.72,
    });

    const tabletop = new THREE.Mesh(new THREE.BoxGeometry(4.8, 0.34, 2.25), woodMaterial);
    tabletop.position.y = 1.36;
    tabletop.castShadow = true;
    tabletop.receiveShadow = true;
    group.add(tabletop);

    const edge = new THREE.Mesh(new THREE.BoxGeometry(4.95, 0.08, 2.38), darkWoodMaterial);
    edge.position.y = 1.13;
    group.add(edge);

    const legGeometry = new THREE.BoxGeometry(0.16, 2.24, 0.16);
    const legPositions = [
        [-1.85, 0.18, -0.82, -0.28],
        [-1.85, 0.18, 0.82, 0.28],
        [1.85, 0.18, -0.82, 0.28],
        [1.85, 0.18, 0.82, -0.28],
    ];

    legPositions.forEach(([x, y, z, rotation]) => {
        const leg = new THREE.Mesh(legGeometry, steelMaterial);
        leg.position.set(x, y, z);
        leg.rotation.z = rotation;
        leg.castShadow = true;
        group.add(leg);
    });

    const stretcher = new THREE.Mesh(new THREE.BoxGeometry(4.1, 0.12, 0.12), steelMaterial);
    stretcher.position.set(0, 0.36, 0);
    group.add(stretcher);

    const ambient = new THREE.HemisphereLight(0xf8f5ef, 0x4a4a46, 2.2);
    scene.add(ambient);

    const key = new THREE.DirectionalLight(0xffe2b8, 2.8);
    key.position.set(3, 5, 4);
    scene.add(key);

    const resize = () => {
        const width = container.clientWidth;
        const height = container.clientHeight;
        renderer.setSize(width, height, false);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
    };

    const render = () => {
        renderer.render(scene, camera);
    };

    resize();
    render();

    window.addEventListener('resize', () => {
        resize();
        render();
    });

    if (prefersReducedMotion) {
        return;
    }

    const animate = () => {
        group.rotation.y += 0.006;
        render();
        window.requestAnimationFrame(animate);
    };

    animate();
}

document.addEventListener('DOMContentLoaded', () => {
    initPortfolioFilters();
    runEnhancement(initReveals);
    runEnhancement(initTableViewer);
});
