<!DOCTYPE html>
<html>
<head>
	<title>BMI Calculator with Identification</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<h1>BMI Calculator with Identification</h1>

	<form>
		<label for="weight">Weight (kg):</label>
		<input type="number" id="weight" name="weight" required><br>

		<label for="height">Height (cm):</label>
		<input type="number" id="height" name="height" required><br>

		<input type="button" value="Calculate" onclick="calculateBMI()"><br><br>

		<label for="bmi">BMI:</label>
		<input type="text" id="bmi" name="bmi" readonly><br>

		<label for="identification">Identification:</label>
		<input type="text" id="identification" name="identification" readonly>
	</form>

	<script>
		function calculateBMI() {
			var weight = document.getElementById("weight").value;
			var height = document.getElementById("height").value;
			var bmi = weight / ((height/100) ** 2);
			document.getElementById("bmi").value = bmi.toFixed(2);

			if (bmi < 18.5) {
				document.getElementById("identification").value = "Underweight";
			} else if (bmi >= 18.5 && bmi < 25) {
				document.getElementById("identification").value = "Normal weight";
			} else if (bmi >= 25 && bmi < 30) {
				document.getElementById("identification").value = "Overweight";
			} else {
				document.getElementById("identification").value = "Obese";
			}
		}
	</script>

</body>
</html>
