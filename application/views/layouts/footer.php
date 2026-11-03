        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="https://indoneptune.co.id" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2026 -
					<!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg> -->
                    <a href="." class="link-secondary">MOMOIS ERP</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="<?= base_url().'assets/js' ?>/vendor/jquery-2.2.4.min.js?1692870487" defer></script>
    <!-- Libs JS -->
    <script src="<?= base_url().'assets/src' ?>/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/libs/litepicker/dist/litepicker.js?1692870487" defer></script>
    <!-- Tabler Core -->
    <script src="<?= base_url().'assets/src' ?>/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/js/demo.min.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/libs/toast/jquery.toast.min.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/libs/tom-select/dist/js/tom-select.base.min.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/js' ?>/html5-qrcode.min.js?1692870487" defer></script>
	<?php if (ENVIRONMENT != 'development') { ?>
		<script>
			$(document).keydown(function(event) {
				if (event.keyCode == 123) { // Prevent F12
					return false;
				} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
					return false;
				}
			});
			$(document).on("contextmenu", function(e) {
				e.preventDefault();
			});
		</script>
	<?php } ?>
	<?php $updatejs = '1775880141'; ?>
    <script src="<?= base_url().'assets' ?>/js/myscript.js?<?= $updatejs; ?>" defer></script>
	<?php if(isset($footer) && $footer['menu']=='rpm'): ?>
		<script src="<?= base_url().'assets' ?>/js/rpm.js?<?= $updatejs; ?>" defer></script>
	<?php endif; ?>
	<?php if(isset($footer) && $footer['menu']=='potjala'): ?>
		<script src="<?= base_url().'assets' ?>/js/potjala.js?<?= $updatejs; ?>" defer></script>
	<?php endif; ?>
	<?php if(isset($footer) && $footer['menu']=='cekjala'): ?>
		<script src="<?= base_url().'assets' ?>/js/cekjala.js?<?= $updatejs; ?>" defer></script>
	<?php endif; ?>
	<?php if(isset($footer) && $footer['menu']=='main'): ?>
	<script src="<?= base_url().'assets' ?>/js/main.js?<?= $updatejs; ?>" defer></script>
	<!-- Data RPM Person -->
	<?php $namabul1='--'; $namabul2='--'; $arrrpmx = []; $arrrpmy = []; $arrrpmtgl = []; ?>
	<?php if(isset($footer['datarpmperson'])):  ?>
	<?php  
		$date = date('Y-m-01');
		$dateakhir = date('Y-m-t');
		$namabul1 = date('M',strtotime($date));
		
		$date2 = date('Y-m-d', strtotime($date. ' - 1 month'));
		$dateakhir2 = date('Y-m-t',strtotime($date2));
		$namabul2 = date('M',strtotime($date2));

		for ($x = 1; $x <= 32; $x++) {
			$dateawal =  strtotime('+' . $x-1 . ' day', strtotime($date));
			$xdate = date('Y-m-d', $dateawal);
			$ada = 0;
			foreach($footer['datarpmperson']->result_array() as $datarpmperson){
				if($datarpmperson['tgl']==$xdate){
					$ada = 1;
					array_push($arrrpmx, $datarpmperson['jumlahrpm']);
				}
			}
			if($ada==0){
				array_push($arrrpmx, 0);
			}
			array_push($arrrpmy, 0);
			array_push($arrrpmtgl, $xdate);
		}	
	?>
	<?php endif; ?> 
	<!-- End Data RPM Person -->
	<!-- RPM per Mesin -->
	<?php $arrpermesin = []; $arrnomesin = []; $jmlarrpermesin = 100; ?>
	<?php if(isset($footer['rpmpermesin'])):  ?>
	<?php  
		$date = date('Y-m-01');
		$dateakhir = date('Y-m-t');
		$namabul1 = date('M',strtotime($date));
		
		$date2 = date('Y-m-d', strtotime($date. ' - 1 month'));
		$dateakhir2 = date('Y-m-t',strtotime($date2));
		$namabul2 = date('M',strtotime($date2));

		foreach($footer['rpmpermesin']->result_array() as $rpmpermesin){
			$jmlarrpermesin += 15;
			array_push($arrnomesin, 'Ms. '.$rpmpermesin['mach_no']);
			array_push($arrpermesin, $rpmpermesin['jumlahrpm']);
		}
	?>
	<?php endif; ?> 
	<!-- END per Mesin -->
	<!-- Data RPM harian -->
	<?php $arrrpmperhari = []; $arrtglperhari = []; $arrtglakhir = ''; ?>
	<?php if(isset($footer['rpmperhari'])):  ?>
	<?php  
		$date = date('Y-m-d');
		$dateakhir = date('Y-m-t');
		$namabul1 = date('M',strtotime($date));
		
		$date2 = date('Y-m-d', strtotime($date. ' - 1 month'));
		$dateakhir2 = date('Y-m-t',strtotime($date2));
		$namabul2 = date('M',strtotime($date2));

		for ($x = 1; $x <= 32; $x++) {
			$dateawal =  strtotime('+' . $x-1 . ' day', strtotime($date2));
			$xdate = date('Y-m-d', $dateawal);
			$ada = 0;
			foreach($footer['rpmperhari']->result_array() as $datarpmharian){
				if($datarpmharian['tgl']==$xdate){
					$ada = 1;
					array_push($arrrpmperhari, $datarpmharian['jumlahrpm']);
				}
			}
			if($ada==0){
				array_push($arrrpmperhari, 0);
			}
			if($x==31){
				$arrtglakhir = $datarpmharian['jumlahrpm'];
			}
			array_push($arrtglperhari, $xdate);
		}
	?>
	<?php endif; ?> 
	<!-- END Data RPM harian -->
	<!-- Data RPM Bulanan -->
	<?php $arrrpmlalu = []; $arrpmskr = []; $arrperiodeini = 0; ?>
	<?php if(isset($footer['rpmperbulan'])):  ?>
	<?php  
		$thnow = $this->session->userdata('periodetahun'); //date('Y');
		for ($thx = $thnow; $thx >= $thnow-1 ; $thx--) { 
			for ($x = 1; $x <= 12; $x++) {
				$ada = 0;
				foreach($footer['rpmperbulan']->result_array() as $datarpmbulanan){
					if(month($datarpmbulanan['tgl'])==$x && year($datarpmbulanan['tgl'])==$thx){
						$ada = 1;
						if($thx==$thnow){
							array_push($arrpmskr, $datarpmbulanan['jumlahrpm']);
						}else{
							array_push($arrrpmlalu, $datarpmbulanan['jumlahrpm']);
						}
					}
					if(month($datarpmbulanan['tgl']) == $this->session->userdata('periodebulan') && year($datarpmbulanan['tgl']) == $this->session->userdata('periodetahun')){  //&& $this->session->userdata('periodetahun')==2025){
						$arrperiodeini = $datarpmbulanan['jumlahrpm'];
					}
				}
				if($ada==0){
					if($thx==$thnow){
							array_push($arrpmskr, 0);
						}else{
							array_push($arrrpmlalu, 0);
						}
				}
				array_push($arrtglperhari, $xdate);
			}
		}
	?>
	<?php endif; ?> 
	<!-- END Data RPM Bulanan -->
	<!-- Data RPM Harian, Mingguan, Bulanan, Tahunan -->
	<?php $hariini = 0; $mingguini = 0; $bulanini = 0; $tahunini = 0;?>
	<?php if(isset($footer['rpmuser'])):  ?>
	<?php  
		$awal = date('Y-m-d');
		$tglawal = $awal;
		$tglakhir = $awal;
		$date = date('Y-m-d');
		for($x=1; $x <= 7; $x++){
			$y = $x-1;
			$date2 = date('w', strtotime($awal. ' - '.$y.' day'));
			if($date2==1){
				$xtglawal = date('Y-m-d', strtotime($date. ' - '.$y.' day'));
				$xtglakhir = date('Y-m-d', strtotime($tglawal. ' + 6 day'));
				$x = 9;
			}
		}
		$thnow = $this->session->userdata('periodetahun'); //date('Y');
		foreach($footer['rpmuser']->result_array() as $datarpmuser){
			$tahunini += $datarpmuser['jumlahrpm'];
			$tgll = $datarpmuser['tgl'];
			if(month($datarpmuser['tgl'])==$this->session->userdata('periodebulan') && year($datarpmuser['tgl'])==$thnow){
				$bulanini += $datarpmuser['jumlahrpm'];
			}
			if($tgll >= $xtglawal && $tgll <= $xtglakhir && month($datarpmuser['tgl'])==$this->session->userdata('periodebulan') && year($datarpmuser['tgl'])==$thnow){
				$mingguini += $datarpmuser['jumlahrpm'];
			}
			if($datarpmuser['tgl']==date('Y-m-d') && month($datarpmuser['tgl'])==$this->session->userdata('periodebulan') && year($datarpmuser['tgl'])==$thnow){
				$hariini += $datarpmuser['jumlahrpm'];
			}
		}
	?>
	<?php endif; ?> 
	<!-- END Data RPM Harian, Mingguan, Bulanan, Tahunan -->
	<!-- Data RPM Total per Grup -->
	<?php $arrrpmperharigrupa = []; $arrrpmperharigrupb = []; $arrrpmperharigrupc = []; $arrtglperharigrup = []; ?>
	<?php if(isset($footer['rpmperharipergrup'])):  ?>
	<?php  
		$date = date('Y-m-d');
		$dateakhir = date('Y-m-t');
		$namabul1 = date('M',strtotime($date));
		
		$date2 = date('Y-m-d', strtotime($date. ' - 1 month'));
		$dateakhir2 = date('Y-m-t',strtotime($date2));
		$namabul2 = date('M',strtotime($date2));

		for ($x = 1; $x <= 32; $x++) {
			$dateawal =  strtotime('+' . $x-1 . ' day', strtotime($date2));
			$xdate = date('Y-m-d', $dateawal);
			$adaa = 0; $adab = 0; $adac=0;
			foreach($footer['rpmperharipergrup']->result_array() as $datarpmharian){
				if($datarpmharian['tgl']==$xdate){
					if($datarpmharian['grup']=='A'){
						$adaa = 1;
						array_push($arrrpmperharigrupa, $datarpmharian['jumlahrpm']);
					}
					if($datarpmharian['grup']=='B'){
						$adab = 1;
						array_push($arrrpmperharigrupb, $datarpmharian['jumlahrpm']);
					}
					if($datarpmharian['grup']=='C'){
						$adac = 1;
						array_push($arrrpmperharigrupc, $datarpmharian['jumlahrpm']);
					}
				}
			}
			if($adaa==0){
				array_push($arrrpmperharigrupa, 0);
			}
			if($adab==0){
				array_push($arrrpmperharigrupb, 0);
			}
			if($adac==0){
				array_push($arrrpmperharigrupc, 0);
			}
			array_push($arrtglperharigrup, $xdate);
		}
	?>
	<?php endif; ?>
	<!-- END Data RPM Total per Grup -->
		<script>
		document.addEventListener("DOMContentLoaded", function () {
			$("#kolomperiodehariini").html('<?= rupiah($arrtglakhir,0) ?>');
		});
		document.addEventListener("DOMContentLoaded", function () {
			$("#kolomtotalrpmperiode").html('<?= rupiah($arrperiodeini,0) ?>');
			$("#tahunini").html('<?= rupiah($tahunini,0) ?>');
			$("#bulanini").html('<?= rupiah($bulanini,0) ?>');
			$("#mingguini").html('<?= rupiah($mingguini,0) ?>');
			$("#hariini").html('<?= rupiah($hariini,0) ?>');
		});
		</script>
		<script>
		var chartbanding = '';
		document.addEventListener("DOMContentLoaded", function () {
			var options = {
			series: [
				{
				name: '<?= $this->session->userdata('periodetahun')-1 ?>',
				// data: [18, 42, 55, 33, 21, 14, 9, 55, 33, 21, 14, 9],
				data: <?= json_encode($arrrpmlalu) ?>
				},
				{
				name: '<?= $this->session->userdata('periodetahun') ?>',
				// data: [64, 96, 138, 71, 52, 88, 130, 138, 71, 52, 88, 130],
				data: <?= json_encode($arrpmskr) ?>
				},
			],
			chart: {
				type: 'bar',
				height: 430,
			},
			plotOptions: {
				bar: {
				horizontal: false,
					dataLabels: {
						position: 'top',
					},
				},
			},
			dataLabels: {
				enabled: false,
			},
			stroke: {
				show: false,
				width: 1,
				colors: ['#fff'],
			},
			grid: {
				padding: {
				right: 30,
				},
			},
			tooltip: {
				shared: true,
				intersect: false,
				y: {	
						formatter: function(val) {
							// Replace dot with comma and return as string
							// return val.toString().replace('.', ',');
							return rupiah(val,'.',',',0);
						}
					}
			},
			// title: {
			// 	text: 'Marketing Spend vs Revenue by Channel',
			// 	align: 'left',
			// },
			xaxis: {
				categories: [
				'Jan',
				'Feb',
				'Mar',
				'Apr',
				'Mei',
				'Jun',
				'Jul',
				'Agt',
				'Sep',
				'Okt',
				'Nop',
				'Des',
				],
				labels: {
					// formatter: function (val) {
					// 	return '$' + Math.round(val) + 'k'
					// },
				},
			},
			}

			chartbanding = new ApexCharts(document.querySelector('#chart-perbandingan'), options)
			chartbanding.render()

		});
		</script>
		<script>
		// @formatter:off
		document.addEventListener("DOMContentLoaded", function () {
			window.ApexCharts && (new ApexCharts(document.getElementById('charte'), {
				chart: {
					type: "bar",
					fontFamily: 'inherit',
					height: <?= $jmlarrpermesin ?>,
					animations: {
						enabled: true
					},
				},
				dataLabels: {
					enabled: false,
					formatter: function(val) {
						// Replace dot with comma and return as string
						// return val.toString().replace('.', ',');
						return rupiah(val,'.',',',0);
						}
				},
				fill: {
					opacity: .6,
					type: 'solid'
				},
				stroke: {
					width: 1,
					lineCap: "round",
					curve: "straight",
				},
				series: [
					{
					name: 'Rpm',
					// data: [1250, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380, 1250, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380],
					data: <?= json_encode($arrpermesin) ?>
					},
				],
				tooltip: {
					theme: 'light',
					y: {
						formatter: function(val) {
						// Replace dot with comma and return as string
						// return val.toString().replace('.', ',');
						return rupiah(val,'.',',',0);
						}
					}
				},
				grid: {
					strokeDashArray: 8,
				},
				xaxis: {
				categories: <?= json_encode($arrnomesin) ?>,
					labels: {
						formatter: function (val) {
							return val
						},
					},
				},
				yaxis: {
					labels: {
						padding: 4
					},
				},
				plotOptions: {
					bar: {
					borderRadius: 2,
					borderRadiusApplication: 'end',
					horizontal: true,
					},
				},
				// labels: [
				// 	'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
				// ],
				colors: [tabler.getColor("green")],
				legend: {
					show: false,
				},
			})).render();
		});
		// @formatter:on
		</script>
		<script>
		// @formatter:off
		document.addEventListener("DOMContentLoaded", function () {
			window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
				chart: {
					type: "area",
					fontFamily: 'inherit',
					height: 80.0,
					sparkline: {
						enabled: true
					},
					animations: {
						enabled: true
					},
				},
				dataLabels: {
					enabled: false,
				},
				fill: {
					opacity: .16,
					type: 'solid'
				},
				stroke: {
					width: 2,
					lineCap: "round",
					curve: "smooth",
				},
				series: [{
					name: "Rpm",
					// data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
					data: <?= json_encode($arrrpmperhari) ?>
				}],
				tooltip: {
					theme: 'dark',
					y: {
						formatter: function(val) {
						// Replace dot with comma and return as string
						// return val.toString().replace('.', ',');
						return rupiah(val,'.',',',0);
						}
					}
				},
				grid: {
					strokeDashArray: 4,
				},
				xaxis: {
					labels: {
						padding: 0,
					},
					tooltip: {
						enabled: false
					},
					axisBorder: {
						show: false,
					},
					type: 'datetime',
				},
				yaxis: {
					labels: {
						padding: 4
					},
				},
				// labels: [
				// 	'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
				// ],
				labels: <?= json_encode($arrtglperhari) ?>,
				colors: [tabler.getColor("pink")],
				legend: {
					show: false,
				},
			})).render();
		});
		// @formatter:on
		</script>
		<script>
		// @formatter:off
		document.addEventListener("DOMContentLoaded", function () {
			window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
				chart: {
					type: "line",
					fontFamily: 'inherit',
					height: 75.0,
					sparkline: {
						enabled: true
					},
					animations: {
						enabled: true
					},
				},
				fill: {
					opacity: 1,
				},
				stroke: {
					width: [2, 1],
					dashArray: [0, 3],
					lineCap: "round",
					curve: "smooth",
				},
				series: [{
					name: "<?= $namabul1 ?>",
					// data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
					data: <?= json_encode($arrrpmx) ?>
				},{
					name: "<?= $namabul2 ?>",
					// data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
					data: <?= json_encode($arrrpmy) ?>
				}],
				tooltip: {
					theme: 'dark',
					y: {
						formatter: function(val) {
						// Replace dot with comma and return as string
						// return val.toString().replace('.', ',');
						return rupiah(val,'.',',',0);
						}
					}
				},
				grid: {
					strokeDashArray: 4,
				},
				xaxis: {
					labels: {
						padding: 0,
					},
					tooltip: {
						enabled: false
					},
					type: 'datetime',
				},
				yaxis: {
					labels: {
						padding: 4
					},
				},
				// labels: [
				// 	'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
				// ],
				labels: <?= json_encode($arrrpmtgl) ?>,
				colors: [tabler.getColor("primary"), tabler.getColor("gray-800")],
				legend: {
					show: false,
					position: 'top',      // Options: 'top', 'right', 'bottom', 'left'
					horizontalAlign: 'right', // Options: 'left', 'center', 'right'
					floating: false       // Set to true to float above the chart area
				},
			})).render();
		});
		// @formatter:on
		</script>
		<script>
		// @formatter:off
		document.addEventListener("DOMContentLoaded", function () {
			window.ApexCharts && (new ApexCharts(document.getElementById('chart-pergrup'), {
				chart: {
					type: "area",
					fontFamily: 'inherit',
					height: 95.0,
					sparkline: {
						enabled: true
					},
					animations: {
						enabled: true
					},
				},
				dataLabels: {
					enabled: false,
				},
				fill: {
					// opacity: .16,
					type: 'gradient',
					// gradient: {
					// type: 'vertical',
					// shadeIntensity: 1,
					// opacityFrom: 0.8,
					// opacityTo: 0.2,
					// stops: [0, 100]
					// }
				},
				stroke: {
					width: 2,
					lineCap: "round",
					curve: "smooth",
				},
				series: [{
					name: "Group A",
					// data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
					data: <?= json_encode($arrrpmperharigrupa) ?>
				},{
					name: "Group B",
					// data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
					data: <?= json_encode($arrrpmperharigrupb) ?>
				},{
					name: "Group C",
					// data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
					data: <?= json_encode($arrrpmperharigrupc) ?>
				}],
				tooltip: {
					theme: 'dark',
					y: {
						formatter: function(val) {
						// Replace dot with comma and return as string
						// return val.toString().replace('.', ',');
						return rupiah(val,'.',',',0);
						}
					}
				},
				grid: {
					strokeDashArray: 4,
				},
				xaxis: {
					labels: {
						padding: 0,
					},
					tooltip: {
						enabled: false
					},
					axisBorder: {
						show: false,
					},
					type: 'datetime',
				},
				yaxis: {
					labels: {
						padding: 4
					},
				},
				// labels: [
				// 	'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
				// ],
				labels: <?= json_encode($arrtglperharigrup) ?>,
				colors: [tabler.getColor("green"), tabler.getColor("cyan"), tabler.getColor("orange")],
				legend: {
					show: false,
				},
			})).render();
		});
		// @formatter:on
		</script>
	<?php endif; ?>
  </body>
</html>