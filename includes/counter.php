<!-- opening -->
<div class="agile-open">
	<div class="open-head">
		<h6>our university opening in</h6>
		<p>“A university is just a group of buildings gathered around a library.” </p>
	</div>
<!-- Countdown-timer -->

				<div class="examples">
					<div class="simply-countdown-losange" id="simply-countdown-losange"></div>
				</div>

			<div class="clearfix"></div>

<!-- //Countdown-timer -->

	<!-- Custom-JavaScript-File-Links -->
	<!-- Countdown-Timer-JavaScript -->
			<script src="./assets/main/js/simplyCountdown.js"></script>
			<script>
				var d = new Date(new Date().getTime() + 48 * 120 * 120 * 2000);

				// default example
				simplyCountdown('.simply-countdown-one', {
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate()
				});

				// inline example
				simplyCountdown('.simply-countdown-inline', {
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate(),
					inline: true
				});

				//jQuery example
				$('#simply-countdown-losange').simplyCountdown({
					year: d.getFullYear(),
					month: d.getMonth() + 1,
					day: d.getDate(),
					enableUtc: false
				});
			</script>

		<!-- //Countdown-Timer-JavaScript -->
	<!-- //Custom-JavaScript-File-Links -->
</div>
<!--// opening -->
