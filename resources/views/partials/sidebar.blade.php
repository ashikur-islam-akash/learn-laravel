<div class="sa-app__sidebar">
    <div class="sa-sidebar">
        <div class="sa-sidebar__header">
            <a class="sa-sidebar__logo" href="{{ route('admin.dashboard') }}">
                <div class="sa-sidebar-logo">
                    <img src="{{ asset('admin/stroyka/images/logo_240x52.png') }}" width="240px" height="48px"
                         alt="image-logo">
                </div>
                <div class="sa-sidebar-logo-narrow">
                    <img style="padding-left: 0.3rem; margin: 0px 10.2px;" width="46" height="46" alt="Logo" src="{{ asset('images/logo.png') }}">
                </div>
            </a>
        </div>
        <div class="sa-sidebar__body" data-simplebar="">
            <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                <li class="sa-nav__section">
                    <div class="sa-nav__section-title"><span>Application</span></div>
                    <ul class="sa-nav__menu sa-nav__menu--root">
                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                            <a href="{{ route('admin.dashboard') }}" class="sa-nav__link">
                                <span class="sa-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                         viewBox="0 0 16 16" fill="currentColor">
                                        <path
                                            d="M8,13.1c-4.4,0-8,3.4-8-3C0,5.6,3.6,2,8,2s8,3.6,8,8.1C16,16.5,12.4,13.1,8,13.1zM8,4c-3.3,0-6,2.7-6,6c0,4,2.4,0.9,5,0.2C7,9.9,7.1,9.5,7.4,9.2l3-2.3c0.4-0.3,1-0.2,1.3,0.3c0.3,0.5,0.2,1.1-0.2,1.4l-2.2,1.7c2.5,0.9,4.8,3.6,4.8-0.2C14,6.7,11.3,4,8,4z">
                                        </path>
                                    </svg>
                                </span>
                                <span class="sa-nav__title">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('user-access')
                    <li class="sa-nav__section">
                        <div class="sa-nav__section-title"><span>Administration</span></div>
                        <ul class="sa-nav__menu sa-nav__menu--root">
                            <li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                data-sa-collapse-item="sa-nav__menu-item--open">
                                <a href="#" class="sa-nav__link main-menu" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                    </svg>
                                </span>
                                    <span class="sa-nav__title">Settings</span>
                                    <span class="sa-nav__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9"
                                         viewBox="0 0 6 9" fill="currentColor">
                                        <path
                                            d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z">
                                        </path>
                                    </svg>
                                </span>
                                </a>
                                <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                    @can('role-permission-access')
                                        <li class="sa-nav__menu-item">
                                            <a href="{{ route('admin.roles.index') }}" class="sa-nav__link">
                                                <i class="fas fa-lock"></i>
                                                <span class="sa-nav__menu-item-padding"></span>
                                                <span class="sa-nav__title">Role & Permission</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('permission-access')
                                        <li class="sa-nav__menu-item">
                                            <a href="{{ route('admin.permissions.index') }}" class="sa-nav__link">
                                                <i class="fas fa-lock"></i>
                                                <span class="sa-nav__menu-item-padding"></span>
                                                <span class="sa-nav__title">Permissions</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user-profile')
                                        <li class="sa-nav__menu-item">
                                            <a href="{{ route('admin.profile') }}" class="sa-nav__link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                                </svg>
                                                <span class="sa-nav__menu-item-padding"></span>
                                                <span class="sa-nav__title">Profile</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user-access')
                                        <li class="sa-nav__menu-item">
                                            <a href="{{ route('admin.users.index') }}" class="sa-nav__link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    <path fill-rule="evenodd"
                                                          d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                                </svg><span class="sa-nav__menu-item-padding"></span>
                                                <span class="sa-nav__title">Users</span>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
    <div class="sa-app__sidebar-shadow"></div>
    <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
</div>
