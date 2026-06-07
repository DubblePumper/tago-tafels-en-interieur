---
applyTo: "**"
---

## Core Principle

Build production-ready websites that are:

- accessible-first
- semantic-first
- performance-first
- secure-by-default
- maintainable
- simple to extend
- easy to use for everyone, including people with disabilities, keyboard-only users, screen reader users, users with cognitive difficulties, and users on slower devices or connections

Always prefer clarity, simplicity, robustness, and maintainability over unnecessary complexity.

Always update the README.md to reflect the current state of the project and provide clear instructions for setup, usage, and contribution.

## Project Setup

- Use Laravel 13.x as the base framework for all code generation.
- Use PHP 8.5.4 as the baseline target version.
- If a newer stable PHP 8.5.x patch release exists at generation time and is compatible, prefer that newer stable patch version.
- Always use the latest stable Laravel 13.x release available at generation time.
- Utilize Laravel Sail for local development and Docker-based environments.
- Ensure compatibility with Windows environments, accounting for file paths, shell differences, and command-line differences.
- Use Composer for dependency management.
- Ensure all packages are compatible with Laravel 13.x and PHP 8.5.x.
- Use npm for frontend dependency management where needed.
- Follow the PER Coding Style 2.0 (PSR-12) coding standard for all PHP code.
- Prefer Blade for server-rendered pages unless a richer frontend architecture is clearly justified.
- Prefer progressive enhancement over unnecessary SPA complexity.
- Keep the stack as simple as possible.

## Project Philosophy

- Accessibility is not optional.
- Semantic HTML is the default, not an afterthought.
- Native HTML elements always come before ARIA.
- UI must remain usable without a mouse.
- Public pages should render meaningful content server-side.
- The backend must stay understandable for a future developer with minimal onboarding.
- Less code is better than more code.
- Simpler code is better than clever code.
- Prefer boring, proven solutions over trendy complexity.
- Every feature must justify its existence in terms of user value.

## Architecture Rules

- Keep controllers thin.
- Put validation in Form Request classes.
- Put authorization in Policies and Gates.
- Put non-trivial business logic in dedicated Actions or Services.
- Use Eloquent ORM and Query Builder as the default database layer.
- Do not introduce repository patterns unless there is a proven need.
- Use queued jobs only for genuinely slow or asynchronous work.
- Use events and listeners only when they reduce coupling meaningfully.
- Keep naming explicit and predictable.
- Group code by domain where useful, but avoid deep or confusing folder structures.
- Prefer readability over cleverness.
- Rewrite existing weak components over adding unnecessary new abstraction layers.

## Security Best Practices

- Enforce HTTPS in production environments using `\URL::forceScheme('https')`.
- Disable debug mode in production: `APP_DEBUG=false`.
- Use environment-specific configuration files.
- Store secrets in the `.env` file and exclude it from version control.
- Use Laravel's encryption for sensitive data.
- Never expose secrets in code, logs, or client-side bundles.

### Authentication and Authorization

- Enforce strong password policies.
- Implement two-factor authentication (2FA) using Laravel Jetstream or Fortify where authentication exists.
- Lock or rate-limit accounts after multiple failed login attempts using Laravel's `throttle` middleware or equivalent rate limiting.
- Use email verification where relevant.
- Use Policies and Gates for authorization.
- Ensure authentication flows are secure and accessible.
- Allow password managers and browser autofill to work correctly.

### Input and Output Security

- Use CSRF protection on all state-changing forms.
- Validate and sanitize all user inputs.
- Prevent SQL injection by using Eloquent ORM or Query Builder.
- Escape output in Blade templates to prevent XSS.
- Carefully validate and sanitize any rich text input.
- Never trust client-provided values blindly.

### File Upload Security

- Validate file types and sizes.
- Validate extension and MIME type.
- Store uploaded files outside the public directory unless they are intentionally public.
- Generate safe filenames.
- Never trust client-provided filenames or content types.
- Use signed URLs or controlled download endpoints for private files.

### Security Operations

- Keep dependencies updated using Composer and npm updates, plus tools like Dependabot where appropriate.
- Prefer well-maintained and trusted packages only.
- Minimize package count.
- Remove unused packages, code, and configuration.
- Implement security headers where appropriate, including CSP and related protections.
- Implement logging and monitoring for security-relevant events.
- Conduct periodic security audits and code reviews.
- Regularly back up the database and application files.
- Ensure backup restore procedures are documented and testable.

## UI/UX Design Guidelines

- Follow established UI/UX principles:
    - Clarity: ensure information is conveyed quickly and accurately.
    - Consistency: maintain uniform design elements throughout the application.
    - Feedback: provide timely and perceptible feedback for user actions.
    - Error management: offer clear error messages and guidance for resolution.
- Prioritize clarity over decoration.
- Design for first-time users and stressed users.
- Minimize friction in key flows.
- Always provide clear feedback after actions.
- Prevent user errors where possible.
- Include loading, empty, success, and error states for all important interfaces.
- Use confirmation dialogs only for destructive or high-risk actions.
- Avoid dark patterns, manipulative design, fake urgency, and misleading buttons.
- Use the proper Web Content Accessibility Guidelines (WCAG)


## Visual Design System and Brand Polish

Every generated website must feel finished, intentional, and visually consistent, not like a raw template.

### Brand Identity and Browser Presence

- Always include a complete favicon and app icon setup for production sites:
    - `favicon.ico` for legacy browser support
    - SVG favicon where appropriate
    - PNG icons such as `icon-192.png` and `icon-512.png`
    - Apple touch icon
    - Web app manifest where useful
    - correct `theme-color` metadata
- Ensure the favicon matches the brand identity, logo, color palette, and visual tone of the website.
- Do not leave default framework icons, placeholder favicons, or generic browser metadata in production.
- Add useful metadata for mobile and installed experiences where relevant:
    - application name
    - short name
    - theme color
    - background color
    - display mode
    - maskable icon support when useful
- Ensure social sharing previews are polished with Open Graph and Twitter/X card metadata where public pages are shareable.
- Use consistent brand naming across title tags, metadata, logo text, footer, structured data, and manifest files.

### Shape, Radius and Corners

- Use a consistent border-radius scale through design tokens instead of random rounded values.
- Define radius tokens for common UI levels:
    - small controls
    - inputs
    - buttons
    - cards
    - modals
    - large panels
    - full pills
- Rounded corners must support the brand style:
    - sharp and minimal for technical/corporate brands
    - soft and friendly for approachable brands
    - larger radius for modern premium interfaces
- Avoid mixing many unrelated corner styles on the same page.
- Use `rounded-full` only when the element is intentionally pill-shaped or circular.
- Keep radius consistent between buttons, form fields, cards, dropdowns, dialogs, and navigation elements.
- Ensure focus rings and hover states follow the same radius as the component.

### Visual Hierarchy and Surface Design

- Use a clear visual hierarchy with consistent spacing, typography, contrast, elevation, and component sizing.
- Define reusable surface styles for:
    - page background
    - cards
    - elevated cards
    - navigation bars
    - dropdowns
    - modals
    - side panels
    - form containers
- Use shadows carefully and consistently; do not create random heavy shadows.
- Prefer subtle borders, background layering, and controlled elevation over excessive shadows.
- Ensure dark mode, if present, has intentional surface colors and not simply inverted light mode colors.
- Use consistent icon sizing, stroke width, alignment, and spacing.
- Use meaningful illustrations or icons only when they support comprehension or brand personality.

### Buttons, Inputs and Interactive Polish

- Buttons must have clear variants such as primary, secondary, ghost, destructive, and link-style where needed.
- Button states must be visually distinct:
    - default
    - hover
    - active
    - focus-visible
    - disabled
    - loading
- Form controls must visually align with the site radius, spacing, focus ring, and color system.
- Inputs must include clear error, success, disabled, readonly, and helper-text states.
- Clickable cards must clearly show that they are interactive without relying on hover only.
- Avoid tiny invisible click targets.
- Keep tap targets comfortable on mobile.

### Micro-Interactions

- Add subtle micro-interactions where they improve perceived quality:
    - button press feedback
    - link underline or color transitions
    - card hover lift only when appropriate
    - dropdown open and close transitions
    - accordion expand and collapse transitions
    - toast enter and exit transitions
    - modal entrance and exit transitions
- Micro-interactions must be fast, subtle, and consistent with the motion system.
- Avoid animations that delay task completion.
- Always respect `prefers-reduced-motion`.

### Layout Finish and Spacing Quality

- Use a consistent spacing scale and avoid arbitrary one-off spacing values.
- Align content to a clear grid or container system.
- Ensure sections have enough breathing room without creating excessive empty space.
- Maintain readable line lengths for text-heavy content.
- Prevent awkward orphan buttons, uneven card heights, inconsistent gutters, and broken alignment.
- Test designs at realistic content lengths, not only perfect short demo text.

### Image, Logo and Media Polish

- Logos must be crisp, correctly sized, and not distorted.
- Use SVG for logos and icons where possible.
- Provide meaningful alt text for informative logos, icons, and images.
- Use empty alt text for decorative images.
- Crop images intentionally instead of letting random object positioning break the layout.
- Use consistent image radius and aspect ratios across cards, galleries, hero sections, and previews.
- Avoid blurry stretched images and placeholder media in production.

### Empty Details That Still Matter

- Include polished 404, 403, 419, and 500 error pages where appropriate.
- Include a consistent loading state for slow actions.
- Include empty states that guide users toward the next useful action.
- Ensure footer, legal links, contact links, and copyright text look intentional.
- Ensure browser tab titles are readable and not generic.
- Ensure the first page load does not visually jump because of missing dimensions, late fonts, or unreserved media space.

## Accessibility Requirements

Target WCAG 2.2 AA compliance for all user-facing interfaces.

### Semantic HTML First

- Use proper semantic elements:
    - `header`
    - `nav`
    - `main`
    - `section`
    - `article`
    - `aside`
    - `footer`
    - `form`
    - `button`
    - `table`
- Do not build button behavior with `div` or `span`.
- Do not build link behavior with JavaScript when a real `<a>` element is correct.
- Use headings in a logical hierarchy.
- Ensure each page has a clear primary heading.
- Use landmarks correctly so assistive technologies can navigate the page easily.
- Use lists for repeated navigation items or grouped content.
- Use tables only for tabular data, never for layout.
- Use `caption`, `thead`, `th`, and `scope` where tables are present.

### Keyboard Accessibility

- All interactive functionality must be fully usable with keyboard only.
- Ensure logical tab order.
- Never create keyboard traps.
- Ensure dropdowns, modals, accordions, tabs, and menus are operable by keyboard.
- Always show a visible focus state.
- Never remove focus outlines unless replaced with a better clearly visible alternative.
- When opening modals or dialogs:
    - move focus into the dialog
    - trap focus appropriately while open
    - restore focus to the triggering control when closed
    - support Escape to close when appropriate

### Screen Reader Accessibility

- Ensure controls have accessible names.
- Provide labels for all form fields.
- Associate helper text and error text programmatically.
- Use `aria-*` attributes only when native HTML cannot provide the needed semantics.
- Do not add ARIA that conflicts with native semantics.
- Decorative images must not create noise for screen readers.
- Important icons must not be the only way information is conveyed.

### Forms and Input Accessibility

- Every form control must have a visible label.
- Clearly indicate required and optional fields.
- Provide format hints where needed.
- Show validation errors near the relevant field and summarize them where useful.
- Preserve user input after validation failure where safe.
- Use appropriate input types, `autocomplete`, `inputmode`, and `name` attributes.

### Visual Accessibility

- Ensure sufficient color contrast for text, icons, controls, and focus states.
- Do not rely on color alone to communicate status or meaning.
- Ensure text remains readable at zoom levels and on small screens.
- Support browser text resizing without layout breakage.
- Use readable font sizes, spacing, and line lengths.
- Make clickable and tappable controls large enough and well-spaced.

### Motion and Sensory Accessibility

- Respect reduced motion preferences.
- Avoid non-essential animation.
- Do not use flashing, flickering, or distracting motion.
- Use animation only to support comprehension, not decoration.
- Keep transitions subtle and fast.
- Ensure the interface remains fully usable when animations are reduced or disabled.

### Cognitive Accessibility

- Use plain, clear language where possible.
- Avoid ambiguous labels such as “Click here”.
- Keep navigation consistent across the site.
- Keep button labels action-oriented and specific.
- Break long content into meaningful sections.
- Avoid clutter, hidden surprises, and unexplained UI patterns.
- Use predictable layouts and interaction patterns.
- Provide consistent help, contact, or support access where relevant.

## Motion, Interaction Smoothness and View Transitions

Use a modern, accessible motion system by default. The goal is smoothness that helps users understand what changed, not decorative motion everywhere.

### Global Motion Rules

- Define motion tokens once and reuse them everywhere:
    - short durations for small UI feedback
    - medium durations for page and panel transitions
    - consistent easing curves
- Prefer animating `transform` and `opacity`.
- Avoid animating layout-heavy properties such as `height`, `width`, `top`, `left`, `margin`, and `padding` unless there is a clear reason and the performance impact is tested.
- Never use global `transition: all` on every element.
- Use `will-change` sparingly and only shortly before an animation, then remove it after the animation where JavaScript is involved.
- Keep animations subtle, fast, and purposeful.
- Every animated interaction must remain usable when motion is reduced or disabled.

### Required Base CSS for Smooth UI

Add a base motion layer to the main CSS entrypoint, usually `resources/css/app.css`:

```css
@view-transition {
    navigation: auto;
}

:root {
    --motion-duration-fast: 120ms;
    --motion-duration-normal: 180ms;
    --motion-duration-slow: 260ms;
    --motion-ease-standard: cubic-bezier(0.2, 0, 0, 1);
    --motion-ease-emphasized: cubic-bezier(0.2, 0, 0, 1);
}

html {
    scroll-behavior: smooth;
}

::view-transition-old(root),
::view-transition-new(root) {
    animation-duration: var(--motion-duration-normal);
    animation-timing-function: var(--motion-ease-standard);
}

:where(button, a, input, select, textarea, summary, [role="button"]) {
    transition:
        background-color var(--motion-duration-fast) var(--motion-ease-standard),
        border-color var(--motion-duration-fast) var(--motion-ease-standard),
        color var(--motion-duration-fast) var(--motion-ease-standard),
        box-shadow var(--motion-duration-fast) var(--motion-ease-standard),
        opacity var(--motion-duration-fast) var(--motion-ease-standard),
        transform var(--motion-duration-fast) var(--motion-ease-standard);
}

:where(button, a, summary, [role="button"]):active {
    transform: translateY(1px);
}

@media (prefers-reduced-motion: reduce) {
    html {
        scroll-behavior: auto;
    }

    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: 0.01ms !important;
    }

    ::view-transition-old(root),
    ::view-transition-new(root) {
        animation: none !important;
    }
}
```

### Cross-Document View Transitions

- Use cross-document View Transitions for Laravel Blade multi-page applications where both the current and destination page are same-origin.
- Opt in with `@view-transition { navigation: auto; }` in the shared CSS loaded by every public page.
- Do not rely on cross-document View Transitions as the only navigation mechanism. Navigation must work normally when unsupported.
- Avoid transitions on:
    - authentication pages where sensitive UI state may change
    - destructive flows
    - file downloads
    - external links
    - pages with large expensive animations or heavy media
- Keep the root page transition simple unless a more specific transition clearly improves comprehension.
- Use `view-transition-name` only for stable shared elements such as logos, persistent navigation, cards moving to detail pages, or product images.
- Ensure each active `view-transition-name` is unique on the page.
- Use `pageswap` and `pagereveal` only when custom transition types or direction-aware transitions are needed.
- Test browser support and provide a normal instant navigation fallback.

### Same-Document View Transitions

For JavaScript-driven UI changes inside the same document, wrap DOM updates with `document.startViewTransition()` when supported:

```js
export function runWithViewTransition(updateDom) {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!document.startViewTransition || prefersReducedMotion) {
        updateDom();
        return Promise.resolve();
    }

    return document.startViewTransition(updateDom).finished;
}
```

Use this for:
- opening and closing panels
- filtering or sorting cards
- tab changes
- replacing visible content after a user action
- expanding a card into a detail state

Do not use it for:
- rapid live updates
- typing feedback
- high-frequency scroll events
- large data tables with many changing rows
- interactions where instant feedback is clearer

### Smooth Expanding, Collapsing, Clicking and Scrolling

- Prefer native `<details>` / `<summary>` for simple accordions.
- Prefer native `<dialog>` for modal dialogs.
- Prefer the Popover API for non-modal menus, tooltips, command palettes, and floating UI where appropriate.
- Use `transition-behavior: allow-discrete` and `@starting-style` where useful for smooth enter/exit transitions involving `display`, `overlay`, popovers, dialogs, or `content-visibility`.
- Use CSS scroll-driven animations only for progressive enhancement and only when they improve orientation or feedback.
- Do not attach heavy work directly to `scroll` handlers.
- For scroll-linked effects, prefer CSS `animation-timeline`, `scroll-timeline`, and `view-timeline` where supported.
- If JavaScript scroll handling is unavoidable, use passive listeners, `IntersectionObserver`, and `requestAnimationFrame`.
- Avoid scroll hijacking, fake inertia, custom scrollbar behavior, or blocking native browser scrolling.
- Smooth anchor scrolling is allowed, but reduced motion must disable it.

## Frontend Implementation Guidelines

- Utilize Laravel's Blade templating engine for clean and maintainable views.
- Integrate Tailwind CSS for responsive and modern UI components.
- Use Tailwind CSS version 4.x.x.
- Use Vite for asset bundling, compilation, minification, and versioning.
- Keep JavaScript minimal and purposeful.
- Prefer progressive enhancement.
- Ensure the page remains functional when JavaScript fails, unless the feature is inherently JavaScript-dependent.
- Avoid shipping large JS bundles for simple interactions.
- Extract shared UI into reusable Blade components and partials.
- Use a consistent spacing scale, typography scale, and reusable component system.
- Use design tokens or central theme values for:
    - colors
    - spacing
    - radius
    - shadows
    - typography
- Do not hardcode random values repeatedly.
- Keep component variants limited and intentional.

## Responsive Design

- Use mobile-first responsive design.
- Ensure layouts work well on:
    - small phones
    - tablets
    - laptops
    - desktop screens
    - zoomed interfaces
- Avoid horizontal scrolling except where truly necessary.
- Maintain adequate whitespace and visual hierarchy.
- Keep containers and line lengths readable.
- Keep navigation simple and predictable.

## Resource Loading, Preload, Prefetch and Prerender

Use resource hints deliberately. Incorrect hints can make performance worse.

### Preload

- Use `<link rel="preload">` only for assets needed by the current page very early.
- Good preload candidates:
    - the LCP image
    - critical self-hosted fonts
    - critical CSS when not already handled by Vite
    - above-the-fold hero media
- Always include the correct `as` value.
- For fonts, include `type="font/woff2"` and `crossorigin`.
- Do not preload assets that are not used on the current page.
- Avoid preloading many files. Preload only the few assets that directly improve LCP.

Example:

```html
<link rel="preload" href="/fonts/inter-var.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/images/hero.webp" as="image" fetchpriority="high">
```

### Module Preload and Vite

- Let Laravel Vite generate the correct asset tags for versioned JavaScript and CSS.
- Use module preloading for critical JavaScript modules when Vite does not already handle it.
- Do not manually reference Vite-built hashed files directly unless there is a clear reason.

### Fetch Priority

- Use `fetchpriority="high"` for the single most important LCP image when needed.
- Use `fetchpriority="low"` for non-critical decorative or below-the-fold images.
- Do not mark many resources as high priority.
- Combine preload and fetch priority carefully; both are hints, not guarantees.

### Preconnect and DNS Prefetch

- Use `preconnect` only for critical third-party origins needed immediately, such as fonts, CDN assets, or payment providers.
- Use `dns-prefetch` for lower-priority third-party origins.
- Do not preconnect to many domains.

Example:

```html
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="dns-prefetch" href="https://analytics.example.com">
```

### Prefetch

- Use `<link rel="prefetch">` for likely future same-site resources or documents.
- Use it for low-risk future navigation assets, not for critical current-page assets.
- Avoid prefetching private, user-specific, frequently changing, or state-changing URLs.
- Ensure cache headers allow useful prefetching.

### Speculation Rules API

Use the Speculation Rules API for Laravel multi-page applications when it can make likely next navigations feel instant.

- Start with `prefetch`; add `prerender` only for high-confidence, safe pages.
- Prefer `conservative` or `moderate` eagerness by default.
- Exclude:
    - logout URLs
    - login/register/password reset flows
    - admin pages
    - checkout/cart mutation pages
    - language switching URLs
    - URLs that trigger emails, SMS, tracking conversions, payments, or state changes
    - URLs with destructive or user-specific side effects
- Do not prerender pages that may become stale after user actions unless the page can refresh or revalidate itself on activation.
- Do not count analytics page views until the prerendered page is activated.
- If CSP is used, allow speculation rules with `'inline-speculation-rules'`, a nonce/hash, or an external `Speculation-Rules` header.
- Keep speculation rules easy to audit.

Safe starter example for a shared Blade layout:

```html
<script type="speculationrules">
{
    "prefetch": [
        {
            "where": {
                "and": [
                    { "href_matches": "/*" },
                    { "not": { "href_matches": "/logout" } },
                    { "not": { "href_matches": "/login*" } },
                    { "not": { "href_matches": "/register*" } },
                    { "not": { "href_matches": "/admin/*" } },
                    { "not": { "href_matches": "/*\\?*(^|&)add-to-cart=*" } },
                    { "not": { "selector_matches": ".no-speculation, [download], [target], [rel~=nofollow]" } }
                ]
            },
            "eagerness": "moderate"
        }
    ],
    "prerender": [
        {
            "where": {
                "selector_matches": "a[data-prerender]"
            },
            "eagerness": "conservative"
        }
    ]
}
</script>
```

Use `data-prerender` only on one or two highly predictable next-step links.

### Prerender Safety

- Treat prerender as opening the page in a hidden tab.
- Assume JavaScript and subresources may load before the user actually navigates.
- Never prerender pages that perform state changes on GET.
- Avoid prerendering pages that request permissions, start media, open WebSockets unnecessarily, or rely on fresh user state.
- Revalidate important user-specific data on `pageshow`, `pagereveal`, or visibility activation where needed.

### 103 Early Hints

- Use HTTP `103 Early Hints` when the server, proxy, or CDN supports it.
- Early Hints should only announce stable, critical resources such as fonts, CSS, or hero images.
- Do not use Early Hints for user-specific or uncertain resources.

### Lazy Loading and Rendering Work

- Lazy-load below-the-fold images and iframes with `loading="lazy"`.
- Use `decoding="async"` for non-critical images.
- Always provide `width`, `height`, and accurate `sizes` to reduce CLS.
- Use `content-visibility: auto` with `contain-intrinsic-size` for long below-the-fold sections where it improves rendering performance.
- Do not apply `content-visibility: auto` blindly to interactive content if it harms find-in-page, focus, accessibility, or layout predictability.

### Back/Forward Cache

- Keep pages eligible for the browser back/forward cache.
- Avoid `unload` handlers.
- Prefer `pagehide`, `pageshow`, and visibility events.
- Reinitialize stale UI safely after bfcache restore.

### Runtime Smoothness and INP

- Keep interaction handlers short.
- Break up expensive JavaScript work.
- Avoid layout thrashing by batching DOM reads and writes.
- Use `requestAnimationFrame` for visual updates.
- Use `requestIdleCallback` only for non-critical work with a fallback.
- Monitor Interaction to Next Paint and Long Animation Frames where production monitoring exists.

## Performance Optimization

- Cache configuration and routes using Artisan commands in production:
    - `php artisan config:cache`
    - `php artisan route:cache`
    - `php artisan view:cache` where appropriate
- Optimize database queries:
    - use eager loading to reduce N+1 query issues
    - index frequently queried columns
    - paginate large result sets
- Use database transactions where data integrity matters.
- Prevent race conditions through transactions, unique constraints, row locking, queue middleware, or idempotent flows where appropriate.
- Optimize images and media.
- Use modern image formats where appropriate.
- Always specify image dimensions to reduce layout shift.
- Lazy-load below-the-fold images and non-critical media.
- Preload only truly critical assets.
- Reduce unused CSS and JS.
- Avoid render-blocking assets where possible.
- Keep fonts efficient and limited in number of families and weights.
- Use caching headers appropriately in production.
- Use immutable cache headers for versioned Vite assets where the deployment setup allows it.
- Use short, safe cache durations or revalidation for HTML and user-specific responses.
- Prefer server-rendered above-the-fold content over client-rendered shells.
- Optimize for bfcache compatibility by avoiding unnecessary unload listeners.
- Monitor slow queries and repeated expensive operations.

### Performance Goals

- Target good Core Web Vitals in real-world usage:
    - LCP <= 2.5s
    - INP <= 200ms
    - CLS <= 0.1

## Code Quality and Maintainability

- Adhere to PER Coding Style 2.0 (PSR-12) coding standards.
- Use Laravel's built-in features wherever practical:
    - Eloquent ORM for database interactions
    - Form Request classes for input validation
    - Policies and Gates for authorization
    - Route model binding where appropriate
    - Resource controllers and named routes consistently
- Use Laravel API Resources for JSON APIs where needed.
- Keep database schemas normalized unless denormalization is clearly needed for performance.
- Use foreign keys, indexes, unique constraints, and sensible database constraints.
- Use timestamps consistently.
- Prefer soft deletes only when there is a genuine product or audit need.
- Document non-obvious schema decisions where useful.
- Keep the backend easy to understand, extend, and debug.

## Testing Requirements

- Implement automated testing.
- Write unit tests for critical domain logic.
- Write feature tests using PHPUnit for important user flows.
- Aim for high test coverage on critical components.
- Test validation, authorization, authentication, and edge cases.
- Test important pages and components at multiple viewport sizes.
- Test keyboard-only navigation.
- Test focus order and focus visibility.
- Test forms, modals, alerts, tables, and navigation for accessibility.
- Run automated accessibility checks where possible.
- Verify progressive enhancement and graceful degradation where relevant.

## SEO and Discoverability

- Use descriptive and unique page titles.
- Use meaningful meta descriptions.
- Use canonical URLs where relevant.
- Ensure headings reflect page structure.
- Ensure internal links are descriptive and useful.
- Generate clean, crawlable URLs.
- Provide `robots.txt` and `sitemap.xml`.
- Add structured data in JSON-LD where relevant to the page type.
- Ensure important content exists in the HTML and is not hidden behind unnecessary client-side rendering.
- Optimize for both humans and search engines, with humans first.

## GEO, AEO and AI Search Optimization

- Optimize content for Google Search, Bing, AI assistants, answer engines, and generative search experiences.
- Structure pages so important answers are clear, concise, and easy to extract.
- Use question-based headings where relevant.
- Provide direct answers near the top of informational pages.
- Use FAQ sections where useful and mark them up with appropriate structured data.
- Use JSON-LD structured data for:
    - Organization
    - LocalBusiness
    - WebSite
    - BreadcrumbList
    - FAQPage
    - Article
    - Product or Service where relevant
- Ensure business name, address, phone number, opening hours, services, and location data are consistent across the website.
- Add clear author, organization, contact, and trust information.
- Write content that demonstrates experience, expertise, authoritativeness, and trustworthiness.
- Avoid thin, generic, AI-sounding content.
- Include useful summaries, comparisons, explanations, and practical answers.
- Make pages easy to quote, summarize, and reference by AI systems.
- Use descriptive alt text for meaningful images.
- Use schema.org markup where relevant.
- Ensure content is crawlable without requiring JavaScript.
- Keep important content visible in the HTML source.
- Use clear internal linking between related pages.
- Create dedicated service/location pages when relevant.
- Keep sitemap.xml, robots.txt, canonical URLs, and metadata correct.

## Content Quality

- Write concise, readable, trustworthy content.
- Avoid filler text in production code.
- Use meaningful button labels, link text, headings, and alt text.
- Use accessible microcopy for errors, hints, and confirmations.
- Make empty states helpful, not dead ends.
- Use consistent terminology across the interface.

## Deployment Considerations

- Use environment-specific configuration files.
- Set appropriate file and directory permissions:
    - `storage` and `bootstrap/cache` should be writable by the web server
- Optimize Laravel appropriately for production.
- Run migrations safely during deployment.
- Ensure queue workers and scheduled tasks are configured correctly.
- Do not deploy with debug tooling enabled unintentionally.
- Keep deployments reproducible and minimal-downtime where possible.

## Monitoring and Observability

- Monitor application performance and errors using tools like Laravel Telescope in development or safe environments, or external services in production.
- Implement structured logging where useful.
- Log errors with enough context to debug them safely.
- Avoid leaking secrets or personal data into logs.
- Monitor:
    - application errors
    - failed jobs
    - slow queries
    - performance regressions
    - suspicious auth activity
- Use Horizon when Redis queues are central to the app and visibility is needed.

## Documentation Requirements

- Document code and APIs using PHPDoc and tools like Swagger / OpenAPI where relevant.
- Document setup steps clearly.
- Document environment variables.
- Document deployment prerequisites.
- Document architecture decisions when they are not obvious.
- Document any non-standard conventions.
- Keep README concise but complete.
- Use PHPDoc where it adds real value, not noise.

## Additional Recommendations

- Implement logging and monitoring for security events.
- Regularly back up the database and application files.
- Conduct periodic security audits and code reviews.
- Keep the codebase lightweight and understandable.
- Remove dead code and obsolete files.
- Prefer refactoring weak code over piling more code on top.

## Coding Directives

- No artifacts: ensure the codebase remains clean without residual or temporary files.
- Less code is better than more code.
- Strive for simplicity and avoid unnecessary complexity.
- No fallback mechanisms that obscure real failures.
- No silent fallbacks that hide real errors.
- Rewrite existing components over adding new ones when appropriate.
- Flag obsolete files to maintain a lightweight codebase.
- Avoid race conditions at all costs.
- Always output the full component unless told otherwise.
- Never say “X remains unchanged”.
- Always show the relevant code.
- Be explicit on where snippets go.
- Clearly indicate placement of snippets, for example below or above another block.
- If only one function changes, show that one fully.
- Use meaningful names.
- Avoid single-letter variables except in trivial loops.
- Do not introduce new dependencies without justification.
- Do not generate placeholder architecture the project does not need.
- Do not sacrifice accessibility or semantics for visual appearance.
- Do not trade maintainability for premature optimization.
- Take your time to think thoroughly when in extended thinking mode.

## Decision Heuristics

When multiple solutions are possible, prefer the option that is:

1. more accessible
2. more semantic
3. easier to maintain
4. faster in real-world usage
5. more secure
6. simpler for future developers to understand

Always explain tradeoffs briefly when choosing a more complex solution.

## Modern Web Platform Features to Prefer

Prefer built-in browser features over custom JavaScript libraries when support and fallbacks are acceptable.

- Use View Transitions for page and state transitions.
- Use Speculation Rules for safe future navigations.
- Use Popover API for non-modal floating UI.
- Use `<dialog>` for modal UI.
- Use CSS Anchor Positioning where supported for anchored popovers/tooltips, with fallback positioning.
- Use CSS Container Queries, including style queries, for component-level responsiveness.
- Use CSS Scroll-Driven Animations for scroll-linked effects instead of JavaScript where supported.
- Use `content-visibility` and containment for long pages after testing.
- Use `transition-behavior: allow-discrete` for smoother enter/exit transitions.
- Use the Long Animation Frames API in diagnostics where available to find janky interactions.
- Use feature detection and progressive enhancement for every non-Baseline or limited-availability feature.

## Browser Support Note

- Tailwind CSS 4.x.x targets modern browsers.
- If older browser support is a hard requirement, explicitly account for that and adapt the frontend approach accordingly.
- Treat limited-availability browser features as progressive enhancement.
- Cross-document View Transitions and Speculation Rules must never be required for core navigation.
- Same-document View Transitions must use feature detection.
- Use `@supports`, JavaScript feature checks, and normal fallbacks instead of browser sniffing.
- Test in current Chromium, Firefox, Safari, and mobile browsers where possible.
