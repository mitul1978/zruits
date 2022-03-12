@extends('layouts.app')
@section('content')
	<!-- <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="padding: 0;"> -->
		<div id="wrapper" dir="ltr" style="background-color: #f7f7f7; margin: 0; padding: 70px 0; width: 100%; -webkit-text-size-adjust: none;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
							{{-- <p style="margin-top: 0;"><img src="https://zehna.netlify.app/static/media/brand-logo.f9600df5.png" alt="Zehna" style="border: none; display: inline-block; font-size: 14px; font-weight: bold; height: 50px; outline: none; text-decoration: none; text-transform: capitalize; vertical-align: middle; max-width: 100%; margin-left: 0; margin-right: 0;"></p>						</div> --}}
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="background-color: #ffffff; border: 1px solid #dedede; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1); border-radius: 3px;">
							
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content" style="background-color: #ffffff;">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top" style="padding: 48px 48px 32px;">
															<div id="body_content_inner" style='color: #636363; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%; text-align: left;'>
																{{-- <p style="margin: 0 0 16px;">Hi bhola,</p>
																<p style="margin: 0 0 16px;">Just to let you know — we've received your order #2956, and it is now being processed:</p>
																<p style="margin: 0 0 16px;">Pay with cash upon delivery.</p> --}}
																<h2 style='color: #000000; display: block; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 130%; margin: 0 0 18px; text-align: left;'>[Order #{{$order->order_number}}] ({{$order->created_at->format('D d M, Y')}})</h2>
																<div style="margin-bottom:40px">
																	<table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
																		<thead>
																			<tr>
																				<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
																				<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Quantity</th>
																				<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Amount</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																			   $subtotal = 0;
																			   $tax = 0;
																				
																			    if($order->total_amount > 1000)
																				{
																					$taxPercent = 12;
																				} 
																				else 
																				{
																					$taxPercent = 5;
																				}
																			?>
																			@foreach ($order->order_list as $key => $list)
																				<tr>
																					<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">{{$list->product->name}}
																						@if($list->product->is_giftcard == 0)
																							<ul style="font-size:small;margin:1em 0 0;padding:0;list-style:none">
																								<li style="margin:0.5em 0 0;padding:0">
																									<strong style="float:left;margin-right:.25em;clear:both">Color:</strong> <p style="margin:0">{{$list->color->name}}</p>
																								</li>
																								<li style="margin:0.5em 0 0;padding:0">
																								<strong style="float:left;margin-right:.25em;clear:both">Size:</strong> <p style="margin:0">{{$list->size->name}}</p>
																								</li>
																							</ul>
																						@endif	
																					</td>
																					<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
																						{{$list->quantity}}		</td>
																						<?php
																							if($list->product->is_giftcard == 0)
																							{
																								$calculateGst = $list->taxable_amount - ( $list->taxable_amount * (100/(100 + $taxPercent)));
																								$amtExclGst = $list->taxable_amount - $calculateGst;
																								$subtotal = $subtotal + $amtExclGst;
																								$tax = $tax + $calculateGst;
																							}	
																							else 
																							{
																								$amtExclGst =  $list->taxable_amount;
																								$subtotal = $subtotal + $amtExclGst;
																								$calculateGst = 0;
																							}
																						?> 
																					<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
																						<span><span>₹</span>{{number_format($list->taxable_amount,2)}}</span></td>
																					
																				</tr>
																			@endforeach
																		</tbody>
																		<tfoot>
																			
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Subtotal:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{number_format($order->taxable_amount,2)}}</span></td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Discount:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{number_format($order->total_discount,2)}}</span></td>
																			</tr>
																			
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Shipping:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Free shipping</td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Payment method:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Online</td>
																			</tr>
																			<?php
																			       $taxAmt = $order->total_amount - ( $order->total_amount * (100/(100 + $taxPercent))); 
																			?>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Taxable Amount:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{number_format($order->total_amount - $taxAmt,2)}}</span></td>
																			</tr>
																			
																			@if($order->state_id == 22)
																				<tr>
																					<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">CGST ({{$taxPercent/2}} %):</th>
																					<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{number_format($taxAmt/2,2)}}</span></td>
																				</tr>
																				<tr>
																					<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">SGST ({{$taxPercent/2}} %):</th>
																					<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{number_format($taxAmt/2,2)}}</span></td>
																				</tr>
																			@else																				
																				<tr>
																					<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">IGST ({{$taxPercent}} %):</th>
																					<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{number_format($taxAmt,2)}}</span></td>
																				</tr>
																			@endif
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total Payable Amount:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span><span>₹</span>{{number_format($order->total_amount,2)}}</span></td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Order Note:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">{{$order->order_note}}</td>
																			</tr>
																		</tfoot>
																	</table>
																	<br>
																	<p style="margin:0 0 16px">Thanks for using Zehna.</p>
																</div>
															</div>
														</td>
													</tr>
												</table>
												<!-- End Content -->
											</td>
										</tr>
									</table>
									<!-- End Body -->
								</td>
							</tr>
						</table>
					</td>
				</tr>

			</table>
		{{-- {{-- </div> --}}
	{{-- </body> --}}

	@endsection