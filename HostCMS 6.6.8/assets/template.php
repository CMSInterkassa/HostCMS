<?php 
        if($this->api_mode){  $payment_systems = $this->getIkPaymentSystems();
            	if (is_array($payment_systems) && !empty($payment_systems)) { ?>
                
                <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                <script src='/templates/template<?= $num ?>/assets/ik.js'></script>
                
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <link rel="stylesheet" href='/templates/template<?= $num ?>/assets/ik.css'>
    		
                
            
                
            	
	<div>
		<button  id="InterkassaModalButton" class="sel-ps-ik btn btn-info btn-lg" data-toggle="modal" data-target="#InterkassaModal">Выберите метод оплаты</button>
	</div>
    <div class="interkasssa" style="text-align: center;">
    	<div id="InterkassaModal" class="modal fade" role="dialog">
    		<div class="modal-dialog modal-lg">
    		
    		
    		
    			<div class="modal-content" id="plans">
    				<div class="container">
    					<h3>
    						1. Choose a convenient payment method<br>
    						2. Enter currency<br>
    						3. Click Pay<br>
    					</h3>
    					<div class="row">
                                <form action="https://sci.interkassa.com/" method="post" id="umi-ik-checkout">
                                    <input type="hidden" name="ik_co_id" value="<?php echo $this->ik_co_id ?>">
                                    <input type="hidden" name="ik_am" value="<?php echo $ik_am ?>">
                                    <input type="hidden" name="ik_pm_no" value="<?php echo $ik_pm_no ?>">
                                    <input type="hidden" name="ik_desc" value="<?php echo $ik_desc ?>">
                                    <input type="hidden" name="ik_cur" value="<?php echo $ik_cur; ?>"/>
                                    <input type="hidden" name="ik_suc_u" value="<?php echo $ik_suc_u ?>">
                                    <input type="hidden" name="ik_fal_u" value="<?php echo $ik_fal_u ?>">
                                    <input type="hidden" name="ik_pnd_u" value="<?php echo $ik_pnd_u ?>">
                                    <input type="hidden" name="ik_ia_u" value="<?php echo $ik_ia_u ?>">
                                    <input type="hidden" name="ik_sign" value="<?php echo $sign ?>">
            
	<?php if (isset($ik_pw_via) && $ik_pw_via == 'test_interkassa_test_xts') { ?>
		<input type="hidden" name='ik_pw_via' value="$ik_pw_via" />
	<?php } ?>

	
	<div>
	
	</div>

	<div class="clearfix"></div>
	<?php if (empty($payment_systems)) { ?>
		<div>
			<input type="submit" value="pay" class="button big"/>
		</div>
	<?php  }
	?>

</form>
        <!-- ====================================  -->
        
 
       <?php
            foreach ($payment_systems as $ps => $info) { ?>
							<div class="col-sm-3 text-center payment_system">
								<div class="panel panel-warning panel-pricing">
									<div class="panel-heading">
										<div class="panel-image">
											<img src="<?php echo "/templates/template$num/paysystems/" . $ps; ?>.png"
												 alt="<?php echo $info['title']; ?>">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="radioBtn btn-group">
											    
												<?php foreach ($info['currency'] as $currency => $currencyAlias) { ?>
													<a class="btn btn-primary btn-sm notActive" href='javascript:void(0);'
													   data-toggle="fun"
													   data-payment ="<?= $ps;?>"
													   data-title="<?= $currencyAlias; ?>"><?= $currency; ?></a>
												<?php } ?>
												
											</div>
										</div>
									</div>
									<div class="panel-footer">
										<a class="btn btn-lg btn-block btn-success ik-payment-confirmation"
										   data-payment="<?= $ps; ?>"
										   href="javascript:void(0);">Pay via<br>
											<strong><?= $info['title']; ?></strong>
										</a>
									</div>
								</div>
							</div>
				<?php }
				echo '					</div>
				</div>
			</div> </div> </div> </div>
';
        }
    }
?>