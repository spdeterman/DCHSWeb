
var dateTracker = new Date();

var currentMonth = dateTracker.getMonth();
var currentDay = dateTracker.getDate();
var currentYear = dateTracker.getFullYear();

function getCurrentDate()
{
	var displayDate = dateTracker.getFullYear() + "-" + dateTracker.getMonth() + "-" + dateTracker.getDate();
	setMonthHeader();
	return displayDate;
}

function getMonthString()
{
	switch(dateTracker.getMonth())
	{
		case 0:
			return "January";
			break;
		case 1:
			return "February";
			break;
		case 2:
			return "March";
			break;
		case 3:
			return "April";
			break;
		case 4:
			return "May";
			break;
		case 5:
			return "June";
			break;
		case 6:
			return "July";
			break;
		case 7:
			return "August";
			break;
		case 8:
			return "September";
			break;
		case 9:
			return "October";
			break;
		case 10:
			return "November";
			break;
		case 11:
			return "December";
			break;
		default:
			return "Error";
	}
}

function increaseMonth() {

	dateTracker.setMonth(dateTracker.getMonth() + 1);
	var displayDate = dateTracker.getFullYear() + "-" + dateTracker.getMonth() + "-" + dateTracker.getDate();
	setMonthHeader();
	return displayDate;
	
}

function decreaseMonth() {

	dateTracker.setMonth(dateTracker.getMonth() - 1);
	var displayDate = dateTracker.getFullYear() + "-" + dateTracker.getMonth() + "-" + dateTracker.getDate();
	setMonthHeader();
	return displayDate;

}


function setMonthHeader() {

	cell = document.getElementById("month-label")
	cell.textContent = (getMonthString() + " " + dateTracker.getFullYear())

}


function jumpToDate() {
	dateTracker.setMonth($("#selectMonth").val());
	dateTracker.setYear($("#selectYear").val());
	var displayDate = dateTracker.getFullYear() + "-" + dateTracker.getMonth() + "-" + dateTracker.getDate();
	setMonthHeader();
	return displayDate;
}

function printCal(cDate) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("calbody").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "calendarbuilder.php?q="+cDate, true);
	xmlhttp.send();
}