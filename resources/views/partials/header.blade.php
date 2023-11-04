<div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
    <div class="sa-toolbar__body">
        <div class="sa-toolbar__item">
            <button class="sa-toolbar__button" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M1,11V9h18v2H1z M1,3h18v2H1V3z M15,17H1v-2h14V17z"></path>
                </svg>
            </button>
        </div>
        <div class="sa-toolbar__item sa-toolbar__item--search">
            {{--<form class="sa-search sa-search--state--pending">
                <div class="sa-search__body">
                    <label class="visually-hidden" for="input-search">Search for:</label>
                    <div class="sa-search__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                            <path
                                d="M16.243 14.828C16.243 14.828 16.047 15.308 15.701 15.654C15.34 16.015 14.828 16.242 14.828 16.242L10.321 11.736C9.247 12.522 7.933 13 6.5 13C2.91 13 0 10.09 0 6.5C0 2.91 2.91 0 6.5 0C10.09 0 13 2.91 13 6.5C13 7.933 12.522 9.247 11.736 10.321L16.243 14.828ZM6.5 2C4.015 2 2 4.015 2 6.5C2 8.985 4.015 11 6.5 11C8.985 11 11 8.985 11 6.5C11 4.015 8.985 2 6.5 2Z"
                            ></path>
                        </svg>
                    </div>
                    <input type="text" id="input-search" class="sa-search__input" placeholder="Search for the truth" autocomplete="off" />
                    <button class="sa-search__cancel d-sm-none" type="button" aria-label="Close search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                            <path
                                d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z"
                            ></path>
                        </svg>
                    </button>
                    <div class="sa-search__field"></div>
                </div>
                <div class="sa-search__dropdown">
                    <div class="sa-search__dropdown-loader"></div>
                    <div class="sa-search__dropdown-wrapper">
                        <div class="sa-search__suggestions sa-suggestions"></div>
                        <div class="sa-search__help sa-search__help--type--no-results">
                            <div class="sa-search__help-title">
                                No results for &quot;
                                <span class="sa-search__query"></span>
                                &quot;
                            </div>
                            <div class="sa-search__help-subtitle">Make sure that all words are spelled correctly.</div>
                        </div>
                        <div class="sa-search__help sa-search__help--type--greeting">
                            <div class="sa-search__help-title">Start typing to search for</div>
                            <div class="sa-search__help-subtitle">Products, orders, customers, actions, etc.</div>
                        </div>
                    </div>
                </div>
                <div class="sa-search__backdrop"></div>
            </form>--}}
        </div>
        <div class="mx-auto"></div>
        <div class="sa-toolbar__item d-sm-none">
            <button class="sa-toolbar__button" type="button" aria-label="Show search" data-sa-action="show-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                    <path
                        d="M16.243 14.828C16.243 14.828 16.047 15.308 15.701 15.654C15.34 16.015 14.828 16.242 14.828 16.242L10.321 11.736C9.247 12.522 7.933 13 6.5 13C2.91 13 0 10.09 0 6.5C0 2.91 2.91 0 6.5 0C10.09 0 13 2.91 13 6.5C13 7.933 12.522 9.247 11.736 10.321L16.243 14.828ZM6.5 2C4.015 2 2 4.015 2 6.5C2 8.985 4.015 11 6.5 11C8.985 11 11 8.985 11 6.5C11 4.015 8.985 2 6.5 2Z"
                    ></path>
                </svg>
            </button>
        </div>
        {{--<div class="sa-toolbar__item dropdown">
            <button
                class="sa-toolbar__button"
                type="button"
                id="dropdownMenuButton3"
                data-bs-toggle="dropdown"
                data-bs-reference="parent"
                data-bs-offset="0,1"
                aria-expanded="false"
            >
                <img src="{{asset('admin/stroyka/vendor/flag-icons/24/BD.png')}}" class="sa-language-icon" alt="" />
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <img src="{{asset('admin/stroyka/vendor/flag-icons/24/BD.png')}}" class="sa-language-icon me-3" alt="" />
                        <span class="ps-2">Bangla</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <img src="{{asset('admin/stroyka/vendor/flag-icons/24/GB.png')}}" class="sa-language-icon me-3" alt="" />
                        <span class="ps-2">English</span>
                    </a>
                </li>


            </ul>
        </div>--}}
        <div class="sa-toolbar__item dropdown">
            <button
                class="sa-toolbar__button"
                type="button"
                id="dropdownMenuButton2"
                data-bs-toggle="dropdown"
                data-bs-reference="parent"
                data-bs-offset="0,1"
                aria-expanded="false"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                    <path
                        d="M8,13c0,0-5.2,0-7,0c0-1-0.1-1.9,1-1.9C2,5,4,2,6,2c0-1.1,0-2,2-2c1.9,0,2,0.9,2,2c2,0,4,3,4,9c1,0,1,1,1,2C12.7,13,8,13,8,13z M6,14h4c0,1.1,0,2-2,2C6,16,6,15.1,6,14L6,14L6,14z"
                    ></path>
                </svg>
                <span class="sa-toolbar__button-indicator">{{--{{count($notifications??0)}}--}}</span>
            </button>
            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuButton2">
                <div class="sa-notifications">
                    <div class="sa-notifications__header">
                        <div class="sa-notifications__header-title">Notifications</div>
                        {{--<a class="sa-notifications__header-action" href="">Mark All as Read</a>--}}
                    </div>
                    <ul class="sa-notifications__list">
                        @if(auth()->user())
                            {{--@forelse($notifications as $notification)
                                <li class="sa-notifications__item mark-as-read-from-header" id="read" data-id="{{ $notification->id }}">
                                    <a href="{{ $notification->data[0]['actionURL'] }}" class="sa-notifications__item-button"  >
                                        <div class="sa-notifications__item-body" >
                                            <div class="sa-notifications__item-title sa-notifications__item-title--nowrap " data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $notification->data[0]['greeting'] }} {{ $notification->data[0]['body'] }}" >
                                                {{ $notification->data[0]['greeting'] }} {{ $notification->data[0]['body'] }}
                                            </div>
                                            <div class="sa-notifications__item-subtitle sa-notifications__item-subtitle--nowrap">{{ $notification->created_at }}</div>
                                        </div>
                                    </a>
                                </li>
                            @empty
                                There are no new notifications
                            @endforelse--}}
                        @endif
                    </ul>
                    <div class="sa-notifications__footer">
                        {{--<a class="sa-notifications__footer-action" href="">See all 15 notifications</a>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown sa-toolbar__item">
            <button
                class="sa-toolbar-user"
                type="button"
                id="dropdownMenuButton"
                data-bs-toggle="dropdown"
                data-bs-offset="0,1"
                aria-expanded="false"
            >
                                <span class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--circle">
                                    <img src="{{asset("storage/". @Auth::user()->image)}}" width="64" height="64" alt="" />
                                </span>
                <span class="sa-toolbar-user__info">
                                    <span class="sa-toolbar-user__title">{{ @Auth::user()->name }}</span>
                                    <span class="sa-toolbar-user__subtitle">
                                        @if(!empty(@Auth::user()))
                                            @foreach(@Auth::user()->getRoleNames() as $r)
                                                <a>{{ $r }}</a>
                                            @endforeach
                                        @endif
                                    </span>
                                </span>
            </button>
            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{route('admin.profile')}}">Profile</a></li>
                <li><a class="dropdown-item" href="{{route('admin.clear-cache')}}">{{__('Clear Cache')}}</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="sa-toolbar__shadow"></div>
</div>
