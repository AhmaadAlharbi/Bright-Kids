<aside class="app-sidebar sticky" id="sidebar">

	<!-- Start::main-sidebar-header -->
	<div class="main-sidebar-header">
		<a href="{{url('index')}}" class="header-logo">
			<img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
			<img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="logo" class="toggle-logo">
			<img src="{{asset('build/assets/images/brand-logos/desktop-white.png')}}" alt="logo" class="desktop-white">
			<img src="{{asset('build/assets/images/brand-logos/toggle-white.png')}}" alt="logo" class="toggle-white">
		</a>
	</div>
	<!-- End::main-sidebar-header -->

	<!-- Start::main-sidebar -->
	<div class="main-sidebar" id="sidebar-scroll">

		<!-- Start::nav -->
		<nav class="main-menu-container nav nav-pills flex-column sub-open">
			<div class="slide-left" id="slide-left">
				<svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
					<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
				</svg>
			</div>
			<ul class="main-menu">
				<!-- Start::slide__category -->
				<li class="slide__category"><span class="category-name">Main</span></li>
				<!-- End::slide__category -->

				<!-- Start::slide -->
				<li class="slide">
					<a href="{{url('index')}}" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
							<path
								d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
						</svg>
						<span class="side-menu__label">Index</span>
						<span class="badge bg-success ms-auto menu-badge">1</span>
					</a>
				</li>
				<li class="slide">
					<a href="{{route('frontend.index')}}" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
							<path
								d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
						</svg>
						<span class="side-menu__label">Home website</span>
						<span class="badge bg-success ms-auto menu-badge">1</span>
					</a>
				</li>
				<!-- End::slide -->

				<!-- Start::slide__category -->
				<li class="slide__category"><span class="category-name">Multi Levels</span></li>
				<!-- End::slide__category -->

				{{--
				<!-- Start::slide -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none" />
							<path
								d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z"
								opacity=".3" />
							<path
								d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z" />
						</svg>
						<span class="side-menu__label">Menu Levels</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="javascript:void(0);" class="side-menu__item">Level-1</a>
						</li>
						<li class="slide has-sub">
							<a href="javascript:void(0);" class="side-menu__item">Level-2
								<i class="fe fe-chevron-right side-menu__angle"></i></a>
							<ul class="slide-menu child2">
								<li class="slide">
									<a href="javascript:void(0);" class="side-menu__item">Level-2-1</a>
								</li>
								<li class="slide has-sub">
									<a href="javascript:void(0);" class="side-menu__item">Level-2-2
										<i class="fe fe-chevron-right side-menu__angle"></i></a>
									<ul class="slide-menu child3">
										<li class="slide">
											<a href="javascript:void(0);" class="side-menu__item">Level-2-2-1</a>
										</li>
										<li class="slide">
											<a href="javascript:void(0);" class="side-menu__item">Level-2-2-2</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li> --}}
				<!-- start::Appointemnrs -->
				<!-- Start::slide -->
				<!-- start::Appointments -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
						</svg>
						<span class="side-menu__label">Appointments</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="{{route('appointments.index')}}" class="side-menu__item">Show Appointments</a>
						</li>
					</ul>
				</li>
				<!-- end::Appointments -->

				<!-- start::Messages -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
						</svg>
						<span class="side-menu__label">Messages</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="{{route('admin.contact-messages.index')}}" class="side-menu__item">Show
								Messages</a>
						</li>
					</ul>
				</li>
				<!-- end::Messages -->

				<!-- start::Parents -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
						</svg>
						<span class="side-menu__label">Parents</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="{{route('parents.index')}}" class="side-menu__item">Show Parents</a>
						</li>
					</ul>
				</li>
				<!-- end::Parents -->

				<!-- start::Students -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path d="M12 14l9-5-9-5-9 5 9 5z" />
							<path
								d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
						</svg>
						<span class="side-menu__label">Students</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="{{route('students.index')}}" class="side-menu__item">Show Students</a>
						</li>
					</ul>
				</li>
				<!-- end::Students -->
				<!-- start::Levels -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path d="M12 14l9-5-9-5-9 5 9 5z" />
							<path
								d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
						</svg>
						<span class="side-menu__label">Levels</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="{{route('levels.index')}}" class="side-menu__item">Show Levels</a>
						</li>
					</ul>
				</li>
				<!-- end::Levels -->
				<!-- start::classrooms -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path d="M12 14l9-5-9-5-9 5 9 5z" />
							<path
								d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
						</svg>
						<span class="side-menu__label">Classrooms</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="{{route('classrooms.index')}}" class="side-menu__item">Show Classrooms</a>
						</li>
					</ul>
				</li>
				<!-- end::classrooms -->
				<!-- start::teachers -->
				<li class="slide has-sub">
					<a href="javascript:void(0);" class="side-menu__item">
						<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="none" viewBox="0 0 24 24"
							stroke="currentColor">
							<path d="M12 14l9-5-9-5-9 5 9 5z" />
							<path
								d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
						</svg>
						<span class="side-menu__label">Teachers</span>
						<i class="fe fe-chevron-right side-menu__angle"></i>
					</a>
					<ul class="slide-menu child1">
						<li class="slide side-menu__label1">
							<a href="javascript:void(0);">Menu Levels</a>
						</li>
						<li class="slide">
							<a href="{{route('teachers.index')}}" class="side-menu__item">Show Teachers</a>
						</li>
					</ul>
				</li>
				<!-- end::teachers -->
			</ul>
			<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
					height="24" viewBox="0 0 24 24">
					<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
				</svg></div>
		</nav>
		<!-- End::nav -->

	</div>
	<!-- End::main-sidebar -->

</aside>