   <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="">Dashboard </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                                        پنل مدیریت
						<a href="{{url('/')}}" target="_blank" rel="noopener noreferrer" class="text-white">
                        {{Auth::user()->name. ' '. Auth::user()->family  }}
</br>
                         <i style="color: green" class="fa fa-circle" aria-hidden="true"></i>
                آنلاین
						</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active"   href="{{url('/admin')}}" >
                                    <i class="fa fa-fw fa-user-circle"></i>داشبورد 
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">
                                    <i class="fa fa-fw fa-rocket"></i>محصولات</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                    @if(Auth::user()->hasPermission('category'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\CategoryController@getCategory')}}">دسته بندی محصولات </a>
                                        </li>
                                        @endif
                                        @if(Auth::user()->hasPermission('products'))
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\ProductController@getProduct')}}">محصولات  </a>
                                        </li>
                                        @endif
                                        @if(Auth::user()->hasPermission('product-specification-type'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\ProductSpecificationTypeController@getList')}}">مشخصات</a>
                                        </li>
                                        @endif
                                        @if(Auth::user()->hasPermission('brands'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\BrandController@getBrand')}}">برندها</a>
                                        </li>
                                        @endif

                                        
                                       
                                        <li class="nav-item">
                                            <a class="nav-link"
                                               href="{{URL::action('App\Http\Controllers\Admin\DiscountController@getIndex')}}">تخفیف ها</a>
                                        </li>
                                   
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                                    <i class="fas fa-fw fa-chart-pie"></i>محتوا</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                    @if(Auth::user()->hasPermission('article-cat'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{URL::action('App\Http\Controllers\Admin\ArticleController@getArticleCat')}}">
                                            دسته بندی مقالات</a>
                                    </li>
                                @endif
                                    @if(Auth::user()->hasPermission('articles'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\ArticleController@getArticle')}}">مقالات</a>
                                        </li>
                                    @endif
                                    @if(Auth::user()->hasPermission('slider'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\SliderController@getSlider')}}">اسلایدر</a>
                                        </li>
                                        @endif
                                      
                            <!--<li class="nav-item">
                                            <a class="nav-link" href="pages/chart-charts.html">بنر موبایل</a>
                                        </li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\QuestionController@getFaq')}}">سوالات متداول سایت</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\TagController@get')}}">تگ ها</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>مدیران</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                               
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           href="{{URL::action('App\Http\Controllers\Admin\UserController@getIndex2')}}">
                                              کاربران سایت
                                        </a>
                                    </li>
                               
                               
								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('App\Http\Controllers\Admin\UserController@getIndex')}}">
										مدیریت مدیران
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link"
										href="{{URL::action('App\Http\Controllers\Admin\UserController@getGroup')}}">
										مدیریت سطح دسترسی
									</a>
								</li>
                               
                             
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\DepartmentController@get')}}">دپارتمان ها</a>
                                    </li>
                             
							</ul>

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>پیام ها</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                    @if(Auth::user()->hasPermission('comment'))
                                <li class="nav-item">
                                @php $comcount =App\Models\Comment::where('status','
								<>','1')->count();
										 @endphp
							<a class="nav-link position-relative" href="{{URL::action('App\Http\Controllers\Admin\CommentController@getIndex')}}">
							 	کامنت ها
								 <span class="badge badge-danger rounded-circle ms-2">
									{{@$comcount}}
								</span>
							</a>
                                </li>

                                @endif
                             
                                     <!-- <li class="nav-item">
                                            <a class="nav-link" href="pages/data-tables.html">درخواست ها</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/general-table.html">پیام ها </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/data-tables.html">به من اطلاع بده</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> سئو </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\RedirectController@getRedirect')}}">ریدایرکت </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\ContentController@getUploader')}}"> آپلودر </a>
                                        </li>
                         
                                    </ul>
                                </div>
                            </li>
                         
 @php $ordercount =App\Models\Order::where('order_status_id','3')->count();
                                    @endphp
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>فاکتورها <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                    @if(Auth::user()->hasPermission('order'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\OrderController@getIndex')}}">همه فاکتور ها</a>
                                        </li>
                                        @endif
                                    @if(Auth::user()->hasPermission('order-status'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\StatusController@get')}}"> وضعیت ها</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>تنظیمات </a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                    @if(Auth::user()->hasPermission('setting'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\SettingController@getEditSetting')}}"> تنظیمات</a>
                                        </li>
                                        @endif
                                @if(Auth::user()->hasPermission('social'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::action('App\Http\Controllers\Admin\SocialController@get')}}"> تنظیمات سوشیال ها</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->