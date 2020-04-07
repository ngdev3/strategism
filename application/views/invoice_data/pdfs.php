<table style="font-size:10px;">
		<tbody>
		<?php ?>
		
			<tr>
				<td align="left">Strategism INC.</td>
			</tr>
			<tr>
				<td>
					<table>
						<tbody>
							
							<tr>
								
								<td colspan="5" align="left">
									<table>
										<tbody>
											<tr><td>39355 California St,Suite 300,Fremont CA, 94538, USA</td></tr>
											<tr><td><strong>Email:</strong>accounts@strategisminc.com </td></tr>
											<tr><td><strong>Website:</strong> www.strategisminc.com</td></tr>
										</tbody>
									</table>
								</td>
							
								
							</tr>
							<tr>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
							</tr>
							<tr>
												<td colspan="12">
													<table>
														<tbody>
															<tr>
																<td  width="100%" border="1" bgcolor="#808080" height="20" style="color:#fff;">
																	Bill To :
																</td>
															</tr><tr>
																<td border="1">
																<?php echo $client_address.' '.$client_zipcode; ?>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
							<tr>
								<td> &nbsp; </td>
								<td> &nbsp; </td>
							</tr>

							<tr>
								<td border="1" width="43" height="30" style="background-color:#a8caff;color:#000">Invoice </td>
								<td border="1" width="150" style="background-color:#a8caff;color:#000"> Date </td>
								<td border="1" width="80" style="background-color:#a8caff;color:#000"> Total Due </td>
								<td border="1" width="150" style="background-color:#a8caff;color:#000"> Due Date </td>
								<td border="1" width="100" style="background-color:#a8caff;color:#000"> Term </td>
								<td border="1" width="101" style="background-color:#a8caff;color:#000"> Enclosed </td>
							</tr>
							<tr>
								<td border="1" height="25"> <?= $invoice_index?> </td>
								<td border="1">  <?php 
								$middle = strtotime($start_date);             // returns bool(false)
								$new_date = date('m/d/Y', $middle);            
								
								$middle = strtotime($end_date);             // returns bool(false)
								$end_new_date = date('m/d/Y', $middle);            
								
								echo $new_date." To ".$end_new_date
								?>  </td>
								<td border="1"> <?= $due_amount ?> </td>
								<td border="1"> <?php 
								$middle = strtotime($due_date);             // returns bool(false)
								$due_date = date('m/d/Y', $middle);            
								echo $due_date;
								?> </td>
								
								<td border="1"> Net <?= $term_days; ?> </td>
								<td border="1"> <?= strtoupper($enclosed_type) ?> </td>
							</tr>
							<tr>
								<td> &nbsp; </td>
								
							</tr>
							<tr>
								<td border="1" width="150" height="30" style="background-color:#7eaffc;color:#000">Activity </td>
								<td border="1" width="48" style="background-color:#a8caff;color:#000"> QTY </td>
								<td border="1" width="94" style="background-color:#a8caff;color:#000"> Rate (Per Hour) </td>
								<td border="1" width="150" style="background-color:#a8caff;color:#000"> Amount </td>
							</tr>
							<tr>
								<td border="1" height="25"> <?php echo "Consulting: ".$emp_name.' IT Consultant ('.$skill_name." )"?>  </td>
								<td border="1"> <?= $hours ?> Hrs  </td>
								<td border="1"> $<?= $bill_rate?> </td>
								<td border="1"> <?= $due_amount?> </td>
								
							</tr>
							
							
							<tr>
								<td colspan="6">
									<table>
										<tbody>
											<tr>
												<td colspan="6">  </td>
											</tr>
											<tr>
												<td colspan="6">
													<table>
														<tbody>
															<tr>
																<td border="1" bgcolor="#383838" height="20" style="color:#fff;">
																	<strong> Balance Due </strong>
																</td>
															</tr>
															<tr><td style="border-left:1px solid #000; border-right:1px solid #000;">	Total Due Amount :  <?= $due_amount?> </td></tr>
															<tr><td style="border-left:1px solid #000; border-right:1px solid #000;border-bottom:1px solid #000;">	</td></tr>
														</tbody>
													</table>
												</td>
											</tr>
											
											<tr> <td> &nbsp;</td> </tr>
											
											<tr>
												<td colspan="6">
													<table>
														<tbody>
															<tr>
																<td  >
																	
																</td>
															</tr><tr>
																<td >
																
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
											
											
										</tbody>
									</table>
								</td>
								
								
							</tr>
							
							
						</tbody>
					</table>
				</td>
				<div style="color:blue" >Thank you for your Business. For any questions on this invoice please contact accounts@strategisminc.com </div>
			</tr>
		</tbody>
		</table>

	