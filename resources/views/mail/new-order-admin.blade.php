<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Zehna order {{$orderDetails->order_number}} received!</title>
	</head>
	<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="padding: 0;">
		<div id="wrapper" dir="ltr" style="background-color: #f7f7f7; margin: 0; padding: 70px 0; width: 100%; -webkit-text-size-adjust: none;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
							<p style="margin-top: 0;"><img src="https://zehna.netlify.app/static/media/brand-logo.f9600df5.png" alt="Zehna" style="border: none; display: inline-block; font-size: 14px; font-weight: bold; height: 50px; outline: none; text-decoration: none; text-transform: capitalize; vertical-align: middle; max-width: 100%; margin-left: 0; margin-right: 0;"></p>						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="background-color: #ffffff; border: 1px solid #dedede; box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1); border-radius: 3px;">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header" style='background-color: #000000; color: #ffffff; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; border-radius: 3px 3px 0 0;'>
										<tr>
											<td id="header_wrapper" style="padding: 36px 48px; display: block;">
												<h1 style='font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 30px; font-weight: 300; line-height: 150%; margin: 0; text-align: left; text-shadow: 0 1px 0 #333333; color: #ffffff; background-color: inherit;'>New order received!</h1>
											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
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
																<p style="margin: 0 0 16px;">Hi admin,</p>
																<p style="margin: 0 0 16px;">You have received order on Zehna. There are more details below for your reference:</p>
																<h2 style='color: #000000; display: block; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 130%; margin: 0 0 18px; text-align: left;'>[Order #{{$orderDetails->order_number}}] ({{date('d-m-Y', strtotime($orderDetails->created_at))}})</h2>
																<div style="margin-bottom:40px">
																	<table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
																		<thead>
																			<tr>
																				<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
																				<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Quantity</th>
																				<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Price</th>
																			</tr>
																		</thead>
																		<?php 
																			$orderList = \App\Models\OrderProductList::where('order_id',$orderDetails->id)->get(); 
																			$orderAddress = \App\Models\UserAddress::where('id',$orderDetails->address_id)->first(); 
																		?>
																		<tbody>
																			@foreach ($orderList as $item)
																				<tr>
																					<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
																						{{$item->product->name}}
																						@if($item->product->is_giftcard == 0)
																							<ul style="font-size:small;margin:1em 0 0;padding:0;list-style:none">
																								<li style="margin:0.5em 0 0;padding:0">
																									<strong style="float:left;margin-right:.25em;clear:both">Color:</strong> <p style="margin:0">{{$item->color->name}}</p>
																								</li>
																								<li style="margin:0.5em 0 0;padding:0">
																								<strong style="float:left;margin-right:.25em;clear:both">Size:</strong> <p style="margin:0">{{$item->size->name}}</p>
																								</li>
																							</ul>
																						@endif
																					</td>
																					<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
																						{{$item->quantity}}		</td>
																					<td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif">
																						<span><span>₹</span>{{$item->sub_total}}</span></td>
																				</tr>
																			@endforeach
																		</tbody>
																		<tfoot>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Subtotal:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{$orderDetails->sub_total}}</span></td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Discount:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px"><span><span>₹</span>{{$orderDetails->total_discount}}</span></td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Shipping:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Free shipping</td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Payment method:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Online</td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span><span>₹</span>{{$orderDetails->total_amount}}</span></td>
																			</tr>
																			<tr>
																				<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Note:</th>
																				<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">{{$orderDetails->order_note}}</td>
																			</tr>
																		</tfoot>
																	</table>
																</div>

																<table cellspacing="0" cellpadding="0" border="0" style="width:100%;vertical-align:top;margin-bottom:40px;padding:0">
																	<tbody>
																		<tr>
																			<td valign="top" width="50%" style="text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
																		    	<h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Billing address</h2>

																			  <address style="padding:12px;color:#636363;border:1px solid #e5e5e5;margin-right: 5px;">
																				{{$orderAddress->first_name}}<br>
																				{{$orderAddress->address}}<br>
																				{{$orderAddress->address2}}<br>
																				{{@$orderAddress->get_city->name}} - {{$orderAddress->pincode}}<br>
																				{{@$orderAddress->get_state->name}}<br>
																				<a href="tel:{{$orderAddress->mobile}}" style="color:#96588a;font-weight:normal;text-decoration:underline" target="_blank">{{$orderAddress->mobile}}</a><br>
																				<a href="mailto:{{$orderAddress->email}}" target="_blank">{{$orderAddress->email}}</a>							
																			   </address>
																			</td>
																			<td valign="top" width="50%" style="text-align:left;font-family:'Helvetica Neue',Helvetica,Roboto,Arial,sans-serif;padding:0">
																				<h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">Shipping address</h2>
																				<address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
																					{{$orderAddress->first_name}}<br>
																					{{$orderAddress->address}}<br>
																					{{$orderAddress->address2}}<br>
																					{{$orderAddress->get_city->name}} - {{$orderAddress->pincode}}<br>
																				    {{$orderAddress->get_state->name}}<br>						
																				</address>
																			</td>
																	   </tr>
																</tbody>
															</table>
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
				<tr>
					<td align="center" valign="top">
						<!-- Footer -->
						<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer" style="margin: auto;">
							<tr>
								<td valign="top" style="padding: 0; border-radius: 6px;">
									<table border="0" cellpadding="10" cellspacing="0" width="100%">
										<tr>
											<td colspan="2" valign="middle" id="credit" style='border-radius: 6px; border: 0; color: #8a8a8a; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 12px; line-height: 150%; text-align: center; padding: 24px 0;'>
												<p style="margin: 0 0 16px;">Zehna</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!-- End Footer -->
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
