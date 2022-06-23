<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bukti Kunjungan Pasien</title>

    <style>
		/* -------------------------------------
			GLOBAL
			A very basic CSS reset
		------------------------------------- */
		* {
			margin: 0;
			padding: 0;
			font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			box-sizing: border-box;
			font-size: 14px;
		}

		img {
			max-width: 100%;
		}

		body {
			-webkit-font-smoothing: antialiased;
			-webkit-text-size-adjust: none;
			width: 100% !important;
			height: 100%;
			line-height: 1.6;
		}

		/* Let's make sure all tables have defaults */
		table td {
			vertical-align: top;
		}

		/* -------------------------------------
			BODY & CONTAINER
		------------------------------------- */
		body {
			background-color: #f6f6f6;
		}

		.body-wrap {
			background-color: #f6f6f6;
			width: 100%;
		}

		.container {
			display: block !important;
			margin: 0 auto !important;
			/* makes it centered */
			clear: both !important;
		}

		.content {
			margin: 0 auto;
			display: block;
			padding: 20px;
		}

		/* -------------------------------------
			HEADER, FOOTER, MAIN
		------------------------------------- */
		.main {
			background: #fff;
			border: 1px solid #e9e9e9;
			border-radius: 3px;
		}

		.content-wrap {
			padding: 20px;
		}

		.header {
			width: 100%;
			margin-bottom: 20px;
		}
		p {
			font-size: 12px;
			margin-bottom: 10px;
			font-weight: normal;
		}
		h1, h2, h3 {
			font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			color: #000;
			line-height: 1.2;
			font-weight: 400;
			font-size: 16px;
		}
		
		.aligncenter {
			text-align: center;
		}

		/* -------------------------------------
			INVOICE
			Styles for the billing table
		------------------------------------- */
		.invoice {
			margin: 40px auto;
			text-align: left;
			width: 80%;
		}
		.invoice td {
			padding: 5px 0;
		}
		.invoice .invoice-items {
			width: 100%;
		}
		.invoice .invoice-items td {
			border-top: #eee 1px solid;
		}
		.invoice .invoice-items .total td {
			border-top: 2px solid #333;
			border-bottom: 2px solid #333;
			font-weight: 700;
		}
	</style>
</head>
<body>
	<table class="body-wrap">
		<tbody><tr>
			<td></td>
			<td class="container" width="600">
				<div class="content">
					<table class="main" width="100%" cellpadding="0" cellspacing="0">
						<tbody><tr>
							<td class="content-wrap aligncenter">
								<table width="100%" cellpadding="0" cellspacing="0">
									<tbody><tr>
										<td>
											<h2 class="aligncenter">Kunjungan Pasien RS PIKTI</h2>
										</td>
									</tr>
									<tr>
										<td class="content-block">
											<table class="invoice">
												<tbody><tr>
													<td>{{$row->nama}}<br>{{$row->alamat}}<br>{{$row->nomorhp}}</td>
												</tr>
												<tr>
													<td>
														<table class="invoice-items" cellpadding="0" cellspacing="0">
															<tbody><tr>
																<td colspan="2">
																	{{$row->dokter}}<br/>
																	{{$row->keluhan}}<br/>
																	{{$row->penanganan}}
																</td>
															</tr>
															<tr class="total">
																<td class="alignright" width="80%">Total</td>
																<td class="alignright">{{$row->biaya}}</td>
															</tr>
														</tbody></table>
													</td>
												</tr>
											</tbody></table>
										</td>
									</tr>
									<tr>
										<td>
											<p>Gedung Teknik Informatika ITS 60111</p>
										</td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
				</div>
			</td>
			<td></td>
		</tr>
	</tbody></table>
</body>