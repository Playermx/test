<?php 
	$model_json = '[{"tickerId":1145,"change":-0.27,"predictionTime":1597298400,"predictionExpireTime":1597384800,"predictionProbability":50.0,"cryptoCurrency":"BITCOIN","ticker":"BTC","currentPrice":11507.9875, "recomendation":0,"up":false, "signalsCount":1}]';

	$model = json_decode($model_json, true);

	$open_price = $now_price = preg_replace('/\.\d{2}\K.+/', '', $model[0]['currentPrice']);
	$target_price = preg_replace('/\.\d{2}\K.+/', '', ($open_price/100*$model[0]['change'] + $open_price));	
?>


<!DOCTYPE html>
<html>
<head>
	<title>BTC Widget</title> 
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
	<main class="widgets-body">
		<header class="widgets-header">
			Dashboard
		</header>
		<div class="crypto-widget btc-widget">
			<div class="crypto-widget__header">
				<div class="crypto-widget__btc-logo">
					<div class="btc-logo sprite sprite-btc"></div>
					<div class="btc-name">
						<div>Bitcoin</div>
						<span>Btc</span>
					</div>
				</div>
				<div class="crypto-widget__signal sprite sprite-signal"></div>
			</div>

			<div class="crypto-widget__body crypto-blocks">
				<div class="crypto-blocks__crypto-one-bl crypto-blocks__open-price">
					<div class="crypto-one-bl__title">Open price</div>
					<div class="crypto-one-bl__price">$ <?php echo $open_price?></div>
					<div class="crypto-one-bl__time">3 hours ago</div>
				</div>
				<div class="crypto-blocks__crypto-one-bl crypto-blocks__now-price">
					<div class="crypto-one-bl__title">Now price</div>
					<div class="crypto-one-bl__price">$ <?php echo $now_price?></div>
					<div class="crypto-one-bl__graph sprite sprite-graph-up"></div>
					<div class="crypto-one-bl__time">Next 24 hours</div>
				</div>
				<div class="crypto-blocks__crypto-one-bl crypto-blocks__target-price <?= ($model[0]['change']>0) ? 'crypto-blocks__target-price_up' : 'crypto-blocks__target-price_down' ?>">
					<div class="crypto-one-bl__title">Target price</div>
					<div class="crypto-one-bl__price <?= ($model[0]['change']>0) ? 'color-green' : 'color-red' ?>">$ <?php echo $target_price?></div>
					<div class="crypto-one-bl__target-val <?= ($model[0]['change']>0) ? 'color-green' : 'color-red' ?>">
						<span class="target-val-up sprite <?= ($model[0]['change']>0) ? 'sprite-arrow-up' : 'sprite-arrow-down' ?>"></span>by <?php echo $model[0]['change']?>%
					</div>
				</div>	
			</div>	

			<div class="crypto-widget__footer crypto-btns">
				<button class="crypto-btns__btn-more">More details</button>				
				<button class="crypto-btns__btn-sell">Sell</button>
			</div>		
		</div>		

		<header class="widgets-header">
			Dashboard (верстка)
		</header>
		<div class="crypto-widget btc-widget">
			<div class="crypto-widget__header">
				<div class="crypto-widget__btc-logo">
					<div class="btc-logo sprite sprite-btc"></div>
					<div class="btc-name">
						<div>Bitcoin</div>
						<span>Btc</span>
					</div>
				</div>
				<div class="crypto-widget__signal sprite sprite-signal"></div>
			</div>

			<div class="crypto-widget__body crypto-blocks">
				<div class="crypto-blocks__crypto-one-bl crypto-blocks__open-price">
					<div class="crypto-one-bl__title">Open price</div>
					<div class="crypto-one-bl__price">$ 9 620.21</div>
					<div class="crypto-one-bl__time">3 hours ago</div>
				</div>
				<div class="crypto-blocks__crypto-one-bl crypto-blocks__now-price">
					<div class="crypto-one-bl__title">Now price</div>
					<div class="crypto-one-bl__price">$ 9 680.41</div>
					<div class="crypto-one-bl__graph sprite sprite-graph-up"></div>
					<div class="crypto-one-bl__time">Next 24 hours</div>
				</div>
				<div class="crypto-blocks__crypto-one-bl crypto-blocks__target-price crypto-blocks__target-price_up">
					<div class="crypto-one-bl__title">Target price</div>
					<div class="crypto-one-bl__price color-green">$ 9 780.67</div>
					<div class="crypto-one-bl__target-val color-green"><span class="target-val-up sprite sprite-arrow-up"></span>by 3.40%</div>
				</div>	
			</div>	

			<div class="crypto-widget__footer crypto-btns">
				<button class="crypto-btns__btn-more">More details</button>
				<button class="crypto-btns__btn-buy">Buy</button>
			</div>		
		</div>	
	</main>
</body>
</html>