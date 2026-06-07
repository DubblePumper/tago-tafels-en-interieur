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

## Frontend Implementation Guidelines

- Utilize Laravel's Blade templating engine for clean and maintainable views.
- Integrate Tailwind CSS for responsive and modern UI components.
- Use Tailwind CSS version 4.3.x.
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

## Browser Support Note

- Tailwind CSS 4.3.x targets modern browsers.
- If older browser support is a hard requirement, explicitly account for that and adapt the frontend approach accordingly.
