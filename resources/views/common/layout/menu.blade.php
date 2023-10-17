<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content" id="sidebar-content" onscroll="scrollMenu(this)">

        <!-- User menu -->
        <div class="sidebar-section sidebar-user my-1">
            <div class="sidebar-section-body">
                <div class="media">
                    <a href="#" class="mr-3">
                        <img src="common/images/logo/main.png" class="rounded-circle" alt="">
                    </a>

                    <div class="media-body">
                        <div class="font-weight-semibold">Nguyen Tu Van</div>
                        <div class="font-size-sm line-height-sm opacity-50">
                            Senior developer
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <button type="button" id="btn-transmit" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                            <i class="icon-transmission"></i>
                        </button>

                        <button type="button" class="btn btn-outline-light-100 text-white border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-lg-none">
                            <i class="icon-cross2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link nav-loading {{active('')}}">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                        <span class="badge badge-primary align-self-center ml-auto">v1.0</span>
                    </a>
                </li>
                <!-- /main -->

                <!-- Forms -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Forms</div> <i class="icon-menu" title="Forms"></i></li>
                <li class="nav-item nav-item-submenu {{open_icon('form_components')}}">
                    <a href="#" class="nav-link"><i class="icon-pencil3"></i> <span>Form components</span></a>
                    <ul class="nav nav-group-sub" {{open('form_components')}}  data-submenu-title="Form components">
                        <li class="nav-item"><a href="{{route('basic-form')}}" class="nav-link nav-loading {{active('basic-form')}}">Basic inputs</a></li>
                        <li class="nav-item"><a href="{{route('checkbox-radio')}}" class="nav-link nav-loading {{active('checkbox-radio')}}">Checkboxes &amp; radios</a></li>
                        <li class="nav-item"><a href="{{route('select2')}}" class="nav-link nav-loading {{active('select2')}}">Select2 selects</a></li>
                        <li class="nav-item"><a href="{{route('multiselect')}}" class="nav-link nav-loading {{active('multiselect')}}">Bootstrap multiselect</a></li>
                        <li class="nav-item"><a href="{{route('input-group')}}" class="nav-link nav-loading {{active('input-group')}}">Input groups</a></li>
                        <li class="nav-item"><a href="{{route('tag-input')}}" class="nav-link nav-loading {{active('tag-input')}}">Tag inputs</a></li>
                        <li class="nav-item"><a href="{{route('list-box')}}" class="nav-link nav-loading {{active('list-box')}}">Dual Listboxes</a></li>
                        <li class="nav-item"><a href="{{route('wizard')}}" class="nav-link nav-loading {{active('wizard')}}">Form wizard</a></li>
                        <li class="nav-item"><a href="{{route('form-layout')}}" class="nav-link nav-loading {{active('form-layout')}}">Form Layout</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('text_editors')}}">
                    <a href="#" class="nav-link"><i class="icon-spell-check"></i> <span>Text editors</span></a>
                    <ul class="nav nav-group-sub" {{open('text_editors')}} data-submenu-title="Text editors">
                        <li class="nav-item"><a href="{{route('editor')}}" class="nav-link nav-loading {{active('editor')}}">Summernote editor</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('pickers')}}">
                    <a href="#" class="nav-link"><i class="icon-select2"></i> <span>Pickers</span></a>
                    <ul class="nav nav-group-sub" {{open('pickers')}} data-submenu-title="Pickers">
                        <li class="nav-item"><a href="{{route('time-picker')}}" class="nav-link nav-loading {{active('time-picker')}}">Date &amp; time pickers</a></li>
                        <li class="nav-item"><a href="{{route('color-picker')}}" class="nav-link nav-loading {{active('color-picker')}}">Color pickers</a></li>
                        <li class="nav-item"><a href="{{route('color-system')}}" class="nav-link nav-loading {{active('color-system')}}">Color system</a></li>
                    </ul>
                </li>
                <!-- /forms -->

                <!-- Components -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Components</div> <i class="icon-menu" title="Components"></i></li>
                <li class="nav-item nav-item-submenu {{open_icon('basic_components')}}">
                    <a href="#" class="nav-link"><i class="icon-grid"></i> <span>Basic components</span></a>
                    <ul class="nav nav-group-sub" {{open('basic_components')}} data-submenu-title="Basic components">
                        <li class="nav-item"><a href="{{route('modal')}}" class="nav-link nav-loading {{active('modal')}}">Modals</a></li>
                        <li class="nav-item"><a href="{{route('dropdown')}}" class="nav-link nav-loading {{active('dropdown')}}">Dropdown menus</a></li>
                        <li class="nav-item"><a href="{{route('tab')}}" class="nav-link nav-loading {{active('tab')}}">Tabs component</a></li>
                        <li class="nav-item"><a href="{{route('collapsible')}}" class="nav-link nav-loading {{active('collapsible')}}">Collapsible</a></li>
                        <li class="nav-item"><a href="{{route('nav')}}" class="nav-link nav-loading {{active('nav')}}">Navs</a></li>
                        <li class="nav-item"><a href="{{route('button')}}" class="nav-link nav-loading {{active('button')}}">Buttons</a></li>
                        <li class="nav-item"><a href="{{route('tooltip')}}" class="nav-link nav-loading {{active('tooltip')}}">Tooltips and popovers</a></li>
                        <li class="nav-item"><a href="{{route('alert')}}" class="nav-link nav-loading {{active('alert')}}">Alerts</a></li>
                        <li class="nav-item"><a href="{{route('pagination')}}" class="nav-link nav-loading {{active('pagination')}}">Pagination</a></li>
                        <li class="nav-item"><a href="{{route('badge')}}" class="nav-link nav-loading {{active('badge')}}">Badges</a></li>
                        <li class="nav-item"><a href="{{route('progress')}}" class="nav-link nav-loading {{active('progress')}}">Progress</a></li>
                        <li class="nav-item"><a href="{{route('media')}}" class="nav-link nav-loading {{active('media')}}">Media objects</a></li>
                        <li class="nav-item"><a href="{{route('scroll')}}" class="nav-link nav-loading {{active('scroll')}}">Scrollspy</a></li>
                        <li class="nav-item"><a href="{{route('slide')}}" class="nav-link nav-loading {{active('slide')}}">Slide</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('extra_components')}}">
                    <a href="#" class="nav-link"><i class="icon-gift"></i> <span>Extra components</span></a>
                    <ul class="nav nav-group-sub" {{open('extra_components')}} data-submenu-title="Extra components">
                        <li class="nav-item"><a href="{{route('notify1')}}" class="nav-link nav-loading {{active('notify1')}}">PNotify notifications</a></li>
                        <li class="nav-item"><a href="{{route('notify2')}}" class="nav-link nav-loading {{active('notify2')}}">jGrowl and Noty notifications</a></li>
                        <li class="nav-item"><a href="{{route('notify3')}}" class="nav-link nav-loading {{active('notify3')}}">SweetAlert notifications</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="{{route('range')}}" class="nav-link nav-loading {{active('range')}}">Ion range sliders</a></li>
                        <li class="nav-item"><a href="{{route('treeview')}}" class="nav-link nav-loading {{active('treeview')}}">Dynamic tree views</a></li>
                        <li class="nav-item"><a href="{{route('button-action')}}" class="nav-link nav-loading {{active('button-action')}}">Floating action buttons</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('content_styling')}}">
                    <a href="#" class="nav-link"><i class="icon-puzzle2"></i> <span>Content styling</span></a>
                    <ul class="nav nav-group-sub" {{open('content_styling')}} data-submenu-title="Content styling">
                        <li class="nav-item"><a href="{{route('page-header')}}" class="nav-link nav-loading {{active('page-header')}}">Page header</a></li>
                        <li class="nav-item"><a href="{{route('page-panel')}}" class="nav-link nav-loading {{active('page-panel')}}">Page panels</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="{{route('card1')}}" class="nav-link nav-loading {{active('card1')}}">Cards</a></li>
                        <li class="nav-item"><a href="{{route('card2')}}" class="nav-link nav-loading {{active('card2')}}">Card content</a></li>
                        <li class="nav-item"><a href="{{route('card3')}}" class="nav-link nav-loading {{active('card3')}}">Card layouts</a></li>
                        <li class="nav-item"><a href="{{route('card4')}}" class="nav-link nav-loading {{active('card4')}}">Card header elements</a></li>
                        <li class="nav-item"><a href="{{route('card5')}}" class="nav-link nav-loading {{active('card5')}}">Card footer elements</a></li>
                        <li class="nav-item"><a href="{{route('card6')}}" class="nav-link nav-loading {{active('card6')}}">Draggable cards</a></li>
                        <li class="nav-item-divider"></li>
                        <li class="nav-item"><a href="{{route('text')}}" class="nav-link nav-loading {{active('text')}}">Text styling</a></li>
                        <li class="nav-item"><a href="{{route('typography')}}" class="nav-link nav-loading {{active('typography')}}">Typography</a></li>
                        <li class="nav-item"><a href="{{route('helper-class')}}" class="nav-link nav-loading {{active('helper-class')}}">Helper classes</a></li>
                        <li class="nav-item"><a href="{{route('flex')}}" class="nav-link nav-loading {{active('flex')}}">Flex utilities</a></li>
                        <li class="nav-item"><a href="{{route('syntax')}}" class="nav-link nav-loading {{active('syntax')}}">Syntax highlighter</a></li>
                        <li class="nav-item"><a href="{{route('grid')}}" class="nav-link nav-loading {{active('grid')}}">Grid system</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('icons')}}">
                    <a href="#" class="nav-link"><i class="icon-thumbs-up2"></i> <span>Icons</span></a>
                    <ul class="nav nav-group-sub" {{open('icons')}} data-submenu-title="Icons">
                        <li class="nav-item"><a href="{{route('icomoon')}}" class="nav-link nav-loading {{active('icomoon')}}">Icomoon</a></li>
                        <li class="nav-item"><a href="{{route('material')}}" class="nav-link nav-loading {{active('material')}}">Material</a></li>
                        <li class="nav-item"><a href="{{route('awesome')}}" class="nav-link nav-loading {{active('awesome')}}">Font awesome</a></li>
                    </ul>
                </li>
                <!-- /components -->

                <!-- Layout -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Screen</div> <i class="icon-menu" title="Layout options"></i></li>
                <li class="nav-item nav-item-submenu {{open_icon('page_layouts')}}">
                    <a href="#" class="nav-link"><i class="icon-stack2"></i> <span>Page layouts</span></a>

                    <ul class="nav nav-group-sub" {{open('page_layouts')}} data-submenu-title="Page layouts">
                        <li class="nav-item"><a href="{{route('widget')}}" class="nav-link nav-loading {{active('widget')}}">Widget</a></li>
                        <li class="nav-item"><a href="{{route('sidebar1')}}" class="nav-link nav-loading {{active('sidebar1')}}">2 sidebars on 1 side</a></li>
                        <li class="nav-item"><a href="{{route('sidebar2')}}" class="nav-link nav-loading {{active('sidebar2')}}">2 sidebars on 2 sides</a></li>
                        <li class="nav-item"><a href="{{route('sidebar3')}}" class="nav-link nav-loading {{active('sidebar3')}}">3 sidebars</a></li>
                        <li class="nav-item"><a href="{{route('sidebar4')}}" class="nav-link nav-loading {{active('sidebar4')}}">Sidebar components</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu {{open_icon('navbars')}}">
                    <a href="#" class="nav-link"><i class="icon-menu3"></i> <span>Navbars</span></a>
                    <ul class="nav nav-group-sub" {{open('navbars')}} data-submenu-title="Navbars">
                        <li class="nav-item"><a href="{{route('navbar1')}}" class="nav-link nav-loading {{active('navbar1')}}">Navbar</a></li>
                        <li class="nav-item"><a href="{{route('navbar2')}}" class="nav-link nav-loading {{active('navbar2')}}">Navbar components</a></li>
                        <li class="nav-item"><a href="{{route('navbar3')}}" class="nav-link nav-loading {{active('navbar3')}}">Badges</a></li>
                        <li class="nav-item"><a href="{{route('navbar4')}}" class="nav-link nav-loading {{active('navbar4')}}">Submenu on click</a></li>
                        <li class="nav-item"><a href="{{route('navbar5')}}" class="nav-link nav-loading {{active('navbar5')}}">Submenu on hover</a></li>
                        <li class="nav-item"><a href="{{route('navbar6')}}" class="nav-link nav-loading {{active('navbar6')}}">With custom elements</a></li>
                        <li class="nav-item"><a href="{{route('navbar7')}}" class="nav-link nav-loading {{active('navbar7')}}">Tabbed navigation</a></li>
                        <li class="nav-item"><a href="{{route('navbar8')}}" class="nav-link nav-loading {{active('navbar8')}}">Horizontal mega menu</a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-tree5"></i> <span>Menu levels</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Menu levels">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-IE"></i> Second level</a></li>
                        <li class="nav-item nav-item-submenu">
                            <a href="#" class="nav-link"><i class="icon-firefox"></i> Second level with child</a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item"><a href="#" class="nav-link"><i class="icon-android"></i> Third level</a></li>
                                <li class="nav-item nav-item-submenu">
                                    <a href="#" class="nav-link"><i class="icon-apple2"></i> Third level with child</a>
                                    <ul class="nav nav-group-sub">
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-html5"></i> Fourth level</a></li>
                                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-css3"></i> Fourth level</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#" class="nav-link"><i class="icon-windows"></i> Third level</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chrome"></i> Second level</a></li>
                    </ul>
                </li>
                <!-- /layout -->

                <!-- Extensions -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Extensions</div> <i class="icon-menu" title="Extensions"></i></li>
                <li class="nav-item nav-item-submenu {{open_icon('extensions')}}">
                    <a href="#" class="nav-link"><i class="icon-puzzle4"></i> <span>Extensions</span></a>
                    <ul class="nav nav-group-sub" {{open('extensions')}} data-submenu-title="Extensions">
                        <li class="nav-item"><a href="{{route('image')}}" class="nav-link nav-loading {{active('image')}}">Image cropper</a></li>
                        <li class="nav-item"><a href="{{route('loading')}}" class="nav-link nav-loading {{active('loading')}}">Block UI</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('jquery_ui')}}">
                    <a href="#" class="nav-link"><i class="icon-popout"></i> <span>JQuery UI</span></a>
                    <ul class="nav nav-group-sub" {{open('jquery_ui')}} data-submenu-title="jQuery UI">
                        <li class="nav-item"><a href="{{route('ui1')}}" class="nav-link nav-loading {{active('ui1')}}">Interactions</a></li>
                        <li class="nav-item"><a href="{{route('ui2')}}" class="nav-link nav-loading {{active('ui2')}}">Forms</a></li>
                        <li class="nav-item"><a href="{{route('ui3')}}" class="nav-link nav-loading {{active('ui3')}}">Components</a></li>
                        <li class="nav-item"><a href="{{route('ui4')}}" class="nav-link nav-loading {{active('ui4')}}">Sliders</a></li>
                        <li class="nav-item"><a href="{{route('ui5')}}" class="nav-link nav-loading {{active('ui5')}}">Navigation</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('files')}}">
                    <a href="#" class="nav-link"><i class="icon-upload"></i> <span>File uploaders</span></a>
                    <ul class="nav nav-group-sub" {{open('files')}} data-submenu-title="File uploaders">
                        <li class="nav-item"><a href="{{route('file1')}}" class="nav-link nav-loading {{active('file1')}}">Plupload</a></li>
                        <li class="nav-item"><a href="{{route('file2')}}" class="nav-link nav-loading {{active('file2')}}">Bootstrap file uploader</a></li>
                        <li class="nav-item"><a href="{{route('file3')}}" class="nav-link nav-loading {{active('file3')}}">Dropzone</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('calendars')}}">
                    <a href="#" class="nav-link"><i class="icon-calendar3"></i> <span>Event calendars</span></a>
                    <ul class="nav nav-group-sub" {{open('calendars')}} data-submenu-title="Event calendars">
                        <li class="nav-item"><a href="{{route('calendar1')}}" class="nav-link nav-loading {{active('calendar1')}}">Basic views</a></li>
                        <li class="nav-item"><a href="{{route('calendar2')}}" class="nav-link nav-loading {{active('calendar2')}}">Event styling</a></li>
                        <li class="nav-item"><a href="{{route('calendar3')}}" class="nav-link nav-loading {{active('calendar3')}}">Language and time</a></li>
                        <li class="nav-item"><a href="{{route('calendar4')}}" class="nav-link nav-loading {{active('calendar4')}}">Advanced usage</a></li>
                    </ul>
                </li>
                <!-- /extensions -->

                <!-- Tables -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Tables</div> <i class="icon-menu" title="Tables"></i></li>
                <li class="nav-item nav-item-submenu {{open_icon('tables')}}">
                    <a href="#" class="nav-link"><i class="icon-table2"></i> <span>Tables</span></a>
                    <ul class="nav nav-group-sub" {{open('tables')}} data-submenu-title="Basic tables">
                        <li class="nav-item"><a href="{{route('table1')}}" class="nav-link nav-loading {{active('table1')}}">Table element</a></li>
                        <li class="nav-item"><a href="{{route('table2')}}" class="nav-link nav-loading {{active('table2')}}">Table styling</a></li>
                        <li class="nav-item"><a href="{{route('table3')}}" class="nav-link nav-loading {{active('table3')}}">Table sorting</a></li>
                        <li class="nav-item"><a href="{{route('table4')}}" class="nav-link nav-loading {{active('table4')}}">Table api</a></li>
                        <li class="nav-item"><a href="{{route('table5')}}" class="nav-link nav-loading {{active('table5')}}">Table autofill</a></li>
                        <li class="nav-item"><a href="{{route('table6')}}" class="nav-link nav-loading {{active('table6')}}">Table key</a></li>
                        <li class="nav-item"><a href="{{route('table7')}}" class="nav-link nav-loading {{active('table7')}}">Table select</a></li>
                        <li class="nav-item"><a href="{{route('table8')}}" class="nav-link nav-loading {{active('table8')}}">Table responsive</a></li>
                        <li class="nav-item"><a href="{{route('table9')}}" class="nav-link nav-loading {{active('table9')}}">Table responsive 2</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('charts')}}">
                    <a href="#" class="nav-link"><i class="icon-graph"></i> <span>Charts</span></a>
                    <ul class="nav nav-group-sub" {{open('charts')}} data-submenu-title="ECharts library">
                        <li class="nav-item"><a href="{{route('chart1')}}" class="nav-link nav-loading {{active('chart1')}}">Line charts</a></li>
                        <li class="nav-item"><a href="{{route('chart2')}}" class="nav-link nav-loading {{active('chart2')}}">Area charts</a></li>
                        <li class="nav-item"><a href="{{route('chart3')}}" class="nav-link nav-loading {{active('chart3')}}">Column charts</a></li>
                        <li class="nav-item"><a href="{{route('chart4')}}" class="nav-link nav-loading {{active('chart4')}}">Pie charts</a></li>
                        <li class="nav-item"><a href="{{route('chart5')}}" class="nav-link nav-loading {{active('chart5')}}">Calendar charts</a></li>
                        <li class="nav-item"><a href="{{route('chart6')}}" class="nav-link nav-loading {{active('chart6')}}">Candle charts</a></li>
                        <li class="nav-item"><a href="{{route('chart7')}}" class="nav-link nav-loading {{active('chart7')}}">Line charts 2</a></li>
                        <li class="nav-item"><a href="{{route('chart8')}}" class="nav-link nav-loading {{active('chart8')}}">Line charts 3</a></li>
                        <li class="nav-item"><a href="{{route('chart9')}}" class="nav-link nav-loading {{active('chart9')}}">Tree charts</a></li>
                    </ul>
                </li>
                <!-- /tables -->

                <!-- Page kits -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Common</div> <i class="icon-menu" title="Page kits"></i></li>
                <li class="nav-item nav-item-submenu {{open_icon('general_pages')}}">
                    <a href="#" class="nav-link"><i class="icon-grid6"></i> <span>General pages</span></a>
                    <ul class="nav nav-group-sub" {{open('general_pages')}} data-submenu-title="General pages">
                        <li class="nav-item"><a href="{{route('feed')}}" class="nav-link nav-loading {{active('feed')}}">Feed</a></li>
                        <li class="nav-item"><a href="{{route('embed')}}" class="nav-link nav-loading {{active('embed')}}">Embeds</a></li>
                        <li class="nav-item"><a href="{{route('faq')}}" class="nav-link nav-loading {{active('faq')}}">FAQ page</a></li>
                        <li class="nav-item"><a href="{{route('timeline')}}" class="nav-link nav-loading {{active('timeline')}}">Timelines</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('blogs')}}">
                    <a href="#" class="nav-link"><i class="icon-blogger2"></i> <span>Blogs</span></a>
                    <ul class="nav nav-group-sub" {{open('blogs')}} data-submenu-title="General pages">
                        <li class="nav-item"><a href="{{route('blog1')}}" class="nav-link nav-loading {{active('blog1')}}">Blog 1</a></li>
                        <li class="nav-item"><a href="{{route('blog2')}}" class="nav-link nav-loading {{active('blog2')}}">Blog 2</a></li>
                        <li class="nav-item"><a href="{{route('blog3')}}" class="nav-link nav-loading {{active('blog3')}}">Blog 3</a></li>
                        <li class="nav-item"><a href="{{route('blog4')}}" class="nav-link nav-loading {{active('blog4')}}">Blog 4</a></li>
                        <li class="nav-item"><a href="{{route('blog5')}}" class="nav-link nav-loading {{active('blog5')}}">Blog 5</a></li>
                        <li class="nav-item"><a href="{{route('blog6')}}" class="nav-link nav-loading {{active('blog6')}}">Blog 6</a></li>
                        <li class="nav-item"><a href="{{route('blog7')}}" class="nav-link nav-loading {{active('blog7')}}">Blog 7</a></li>
                        <li class="nav-item"><a href="{{route('blog8')}}" class="nav-link nav-loading {{active('blog8')}}">Blog 8</a></li>
                        <li class="nav-item"><a href="{{route('blog9')}}" class="nav-link nav-loading {{active('blog9')}}">Blog 9</a></li>
                        <li class="nav-item"><a href="{{route('blog10')}}" class="nav-link nav-loading {{active('blog10')}}">Blog 10</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('login')}}">
                    <a href="#" class="nav-link"><i class="icon-windows2"></i> <span>Service page</span></a>
                    <ul class="nav nav-group-sub" {{open('login')}} data-submenu-title="General pages">
                        <li class="nav-item"><a href="{{route('sitemap')}}" class="nav-link nav-loading {{active('sitemap')}}">Sitemap</a></li>
                        <li class="nav-item"><a href="{{route('error404')}}" class="nav-link nav-loading {{active('error404')}}">Error 404</a></li>
                        <li class="nav-item"><a href="{{route('unlock')}}" class="nav-link nav-loading {{active('unlock')}}">Unlock user</a></li>
                        <li class="nav-item"><a href="{{route('reset')}}" class="nav-link nav-loading {{active('reset')}}">Reset password</a></li>
                        <li class="nav-item"><a href="{{route('validation')}}" class="nav-link nav-loading {{active('validation')}}">With validation</a></li>
                        <li class="nav-item"><a href="{{route('tabbed')}}" class="nav-link nav-loading {{active('tabbed')}}">Tabbed form</a></li>
                        <li class="nav-item"><a href="{{route('modalogin')}}" class="nav-link nav-loading {{active('modalogin')}}">Inside modals</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('users')}}">
                    <a href="#" class="nav-link"><i class="icon-people"></i> <span>User pages</span></a>
                    <ul class="nav nav-group-sub" {{open('users')}} data-submenu-title="User pages">
                        <li class="nav-item"><a href="{{route('user1')}}" class="nav-link nav-loading {{active('user1')}}">User list</a></li>
                        <li class="nav-item"><a href="{{route('user2')}}" class="nav-link nav-loading {{active('user2')}}">User cards</a></li>
                        <li class="nav-item"><a href="{{route('user3')}}" class="nav-link nav-loading {{active('user3')}}">Simple profile</a></li>
                        <li class="nav-item"><a href="{{route('user4')}}" class="nav-link nav-loading {{active('user4')}}">Tabbed profile</a></li>
                        <li class="nav-item"><a href="{{route('user5')}}" class="nav-link nav-loading {{active('user5')}}">Profile with cover</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu {{open_icon('app')}}">
                    <a href="#" class="nav-link"><i class="icon-cube3"></i> <span>Application pages</span></a>
                    <ul class="nav nav-group-sub" {{open('app')}} data-submenu-title="User pages">
                        <li class="nav-item"><a href="{{route('task1')}}" class="nav-link nav-loading {{active('task1')}}">Task 1</a></li>
                        <li class="nav-item"><a href="{{route('task2')}}" class="nav-link nav-loading {{active('task2')}}">Task 2</a></li>
                        <li class="nav-item"><a href="{{route('task3')}}" class="nav-link nav-loading {{active('task3')}}">Task 3</a></li>
                        <li class="nav-item"><a href="{{route('search1')}}" class="nav-link nav-loading {{active('search1')}}">Search 1</a></li>
                        <li class="nav-item"><a href="{{route('search2')}}" class="nav-link nav-loading {{active('search2')}}">Search 2</a></li>
                        <li class="nav-item"><a href="{{route('search3')}}" class="nav-link nav-loading {{active('search3')}}">Search 3</a></li>
                        <li class="nav-item"><a href="{{route('search4')}}" class="nav-link nav-loading {{active('search4')}}">Search 4</a></li>
                        <li class="nav-item"><a href="{{route('learning1')}}" class="nav-link nav-loading {{active('learning1')}}">Learning 1</a></li>
                        <li class="nav-item"><a href="{{route('learning2')}}" class="nav-link nav-loading {{active('learning2')}}">Learning 2</a></li>
                        <li class="nav-item"><a href="{{route('learning3')}}" class="nav-link nav-loading {{active('learning3')}}">Learning 3</a></li>
                        <li class="nav-item"><a href="{{route('learning4')}}" class="nav-link nav-loading {{active('learning4')}}">Learning 4</a></li>
                        <li class="nav-item"><a href="{{route('product1')}}" class="nav-link nav-loading {{active('product1')}}">Product 1</a></li>
                        <li class="nav-item"><a href="{{route('product2')}}" class="nav-link nav-loading {{active('product2')}}">Product 2</a></li>
                        <li class="nav-item"><a href="{{route('product3')}}" class="nav-link nav-loading {{active('product3')}}">Product 3</a></li>
                        <li class="nav-item"><a href="{{route('product4')}}" class="nav-link nav-loading {{active('product4')}}">Product 4</a></li>
                        <li class="nav-item"><a href="{{route('product5')}}" class="nav-link nav-loading {{active('product5')}}">Product 5</a></li>
                    </ul>
                </li>
                <!-- /page kits -->
                <li class="nav-item-divider"></li>
                <li class="nav-item-divider"></li>
                <li class="nav-item-divider"></li>
                <li class="nav-item-divider"></li>
                <li class="nav-item-divider"></li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>