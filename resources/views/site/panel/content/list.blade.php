<div class="col-12 p-3">
								<ul class="p-0 m-0 listsidepanel">
									<li class="list-unstyled side-item @if($seg[1] == 'dashboard' ) active @endif ">
										<a href="{{route('panel.dashboard')}}" class="side-link">
											<i class="bi bi-speedometer2"></i>
											داشبورد
											<i class="bi bi-arrow-left d-flex"></i>
										</a>
										
									</li>
									<li class="list-unstyled side-item @if($seg[1] == 'edit-info' ) active @endif">
										<a href="{{route('panel.edit')}}"  class="side-link">
											<i class="bi bi-pencil"></i>
											ویرایش اطلاعات
											<i class="bi bi-arrow-left d-flex"></i>
										</a>
									</li>
									<li class="list-unstyled side-item @if($seg[1] == 'reset-password' ) active @endif">
										<a href="{{route('panel.pass')}}"  class="side-link">
											<i class="bi bi-pencil"></i>
										تغییر رمز عبور
											<i class="bi bi-arrow-left d-flex"></i>
										</a>
									</li>
									<li class="list-unstyled side-item @if($seg[1] == 'addresses' ) active @endif">
										<a href="{{ route('panel.address') }}" class="side-link">
											<i class="bi bi-map"></i>
										آدرس های من
										<i class="bi bi-arrow-left d-flex"></i>
										</a>
									</li>
									<li class="list-unstyled side-item @if($seg[1] == 'favorites' ) active @endif ">
										<a href="{{ route('panel.favorites') }}" class="side-link">
											<i class="bi bi-suit-heart"></i>
											علاقه مندی ها
											<i class="bi bi-arrow-left d-flex"></i>
										</a>
									</li>
									<li class="list-unstyled side-item @if($seg[1] == 'orders' ) active @endif">
										<a href="{{route('panel.orders')}}" class="side-link">
											<i class="bi bi-cart4"></i>
											سفارشات
											<i class="bi bi-arrow-left d-flex"></i>
										</a>
									</li>
									<li class="list-unstyled side-item @if($seg[1] == 'tickets' ) active @endif">
									@php $tickcount =App\Models\Ticket::where('user_id',auth()->user()->id)->whereNull('order_item_id')->whereStatus(1)->count();
                					@endphp
										<a href="{{route('panel.tickets')}}" class="side-link">
											<i class="bi bi-envelope"></i>
											تیکت
											<i class="bi bi-arrow-left d-flex"></i>
										</a>
									</li>
									<li class="list-unstyled">
										<a href="{{ route('panel.logout') }}" class="side-link">
											<i class="bi bi-power"></i>
											خروج
											<i class="bi bi-arrow-left d-flex"></i>
										</a>
									</li>
								</ul>
							</div>