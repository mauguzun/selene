<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />

		<title>
			<?= $order['id']?> <?= $user['email']?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- Latest compiled and minified CSS -->
		<style>
			/* CSS Snippet For Responsive Table - Stylized */

			/* Basic */
			thead td
			{
				font-weight: bold;

			}
			*
			{
				box-sizing: border-box;
				font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
				font-size: 11px;
			}
			.page_break
			{
				page-break-before: always;
			}
			table
			{
				border-spacing: 0px;
				border-collapse: collapse;
				width: 100%;
				max-width: 100%;
				margin-bottom: 15px;
				background-color: transparent; /* Change the background-color of table here */
				text-align: left; /* Change the text-alignment of table here */
			}

			th
			{
				font-weight: bold;
				padding: 10px;
			}

			td
			{
				padding: 10px;
				width: 50%;
			}
			td.ten
			{
				width: 10%;text-align: right;
			}
			td.five
			{
				width: 5%;
				text-align: right;
			}
			td.fivteen{
					width: 15%;
				text-align: right;
			}

			/* Stylized */

			/* Adding Striped Effect for odd rows */

			tr
			{
				background-color: transparent; /* Change the default background-color of rows here */
			}


			tr th
			{
				background-color: #dddddd; /* Change the background-color of heading here */
			}




			/* Removing left and right border of rows for modern UIs */

			tbody tr
			{
				border-top: 1px solid #cccccc;
				border-bottom: 1px solid #cccccc;
			}

			th, td
			{
				border: none;
			}
		</style>
	</head>
	<body>






		<div class="panel-body">

			<div class="head">
				<?= lang('bill') ?>
			</div>
			<table class="table table-condensed">
				<tbody>
					<tr>
						<td>
							<?= lang('order_id')?>
						</td>
						<td>
							<a href="#"><?= $order['id']?></a>
						</td>
					</tr>
					<tr>
						<td>
							<?= lang('order_time')?>
						</td>
						<td>
							<?= date("d/m/Y H:i:s",(int)$order['id']) ?>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="head">
				<?= lang('bill_to') ?>
			</div>

			<table class="table table-condensed">
				<tbody>
					<?
					$user_data = ['first_name','last_name','email','phone','country','city','zip','address'];?>

					<?
					foreach($user_data as $value):?>
					<tr>
						<td><?= lang($value); ?></td>

						<td><?= $user[$value]  ?></td>
					</tr>
					<? endforeach ;?>

				</tbody>
			</table>
			<!--company-->
			<?
			if(!empty($user['company'])) :?>
			<div class="head">
				<?= lang('company') ?>
			</div>
			<table class="table table-condensed">
				<tbody>
					<?
					$user_data = ['company','company_num'];?>

					<?
					foreach($user_data as $value):?>
					<tr>
						<td><?= lang($value); ?></td>

						<td><?= $user[$value]  ?></td>
					</tr>
					<? endforeach ;?>

				</tbody>
			</table>
			<? endif;?>
			<!--row-->
			<div class="head">
				<?= lang('order_itmes') ?>
			</div>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td class="ten"> <?= lang('product_id')?></td>
						<td ><?= lang('title')?></td>
						<td class="ten"> <?= lang('price')?></td>
						<td class="five"> <?= lang('qty')?></td>
						<td class="fivteen"><?= lang('subtotal')?></td>
					</tr>
				</thead>
				<tbody>
					<?
					foreach($query as $value):?>
					<tr>
						<td class="ten"> <?= $value['product_id'] ?></td>
						<td ><?= $value['title']   ?></td>
						<td class="ten"> <?= $value['price'] ?> NOK</td>
						<td class="five"> <?= $value['qty'] ?></td>
						<td class="fivteen"> <?= $value['total'] ?> NOK</td>
					</tr>
					<? endforeach ;?>

				</tbody>
			</table>
			<!--shipping-->
			<div class="head">
				<?= lang('shipping') ?>

				<table>
				
						<tr style="border:none !important;padding:20px;font-weight: bold;">
							<td>
								<?
								if(empty($order['shiping_address'])) :?>
								<?= $user['country']?>
								<?= $user['city']?>
								<?= $user['zip']?>
								<?= $user['address']?>

								<?
								else :?>
								<?= $order['shiping_address']?>
								<? endif; ?>

							</td>

						</tr>
					
				</table>






			</div>


			<!--total-->
			<div class="head">
				<?= lang('grand_total') ?>
			</div>
			<table class="table table-condensed">

				<tbody>
					<tr>
						<td><?= lang('shipping')?></td>
						<td><?= SHIPPING ?> NOK </td>
					</tr>
					<tr>
						<td><?= lang('total')?></td>
						<td><?= $order['total'] / 100 - SHIPPING  ?> NOK </td>
					</tr>
					<tr>
						<td><?= lang('grand_total')?></td>
						<td>
							<strong><?= $order['total'] / 100 ?> NOK </strong></td>
					</tr>


				</tbody>
			</table>

		</div>




	</body>
</html>
<style>
	.head
	{
		background: #fafafa;
		text-align: center;
		padding-top: 20px;
		padding-bottom: 20px;
		border: 1px dotted grey;
		margin-bottom: 10px;

	}
	td
	{
		white-space: normal !important;
	}
	a
	{
		color: grey;
	}
</style>