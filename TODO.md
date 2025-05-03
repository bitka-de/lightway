# TODO List

## Phase 1: Setup
- [ ] Initialize project folder and composer.json
- [ ] Create `public/index.php` and `.htaccess`
- [ ] Dump autoload

## Phase 2: Core Kernel
- [ ] Create Core classes: Application.php, Router.php, Middleware.php, Container.php
- [ ] Define Contracts: RequestInterface.php, ResponseInterface.php
- [ ] Implement Request.php and Response.php
- [ ] Implement Container bind/get

## Phase 3: Routing & Middleware
- [ ] Implement Router dispatch logic
- [ ] Implement Middleware pipeline (`add`, `handle`)

## Phase 4: Application Integration
- [ ] Wire up Application->run() in public/index.php

## Phase 5: Sample Middleware & Controller
- [ ] Create LoggerMiddleware.php and ErrorHandler.php
- [ ] Create HomeController.php

## Phase 6: Configuration
- [ ] Add `src/Config/config.php` and `db.php`

## Phase 7: Data Layer
- [ ] Implement Connection.php
- [ ] Implement QueryBuilder.php
- [ ] Implement Repository.php and UserRepository.php

## Phase 8: View Layer
- [ ] Implement View.php
- [ ] Add home.php template

## Phase 9: Container Bindings
- [ ] Register Connection, Repositories, View, Controllers in bootstrap

## Phase 10: Testing
- [ ] Setup test structure under tests/
- [ ] Write unit tests for Core, Data, Controllers
