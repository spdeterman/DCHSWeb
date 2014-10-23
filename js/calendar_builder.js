
var dateTracker = new Date();

var currentMonth = dateTracker.getMonth();
var currentDay = dateTracker.getDate();
var currentYear = dateTracker.getFullYear();

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
	
}

function decreaseMonth() {

	dateTracker.setMonth(dateTracker.getMonth() - 1);

}

// Returns a boolean denoting whether or not the current month's calendar is being viewed
function onCurrentMonth() {

	return dateTracker.getMonth() == currentMonth && dateTracker.getFullYear() == currentYear;

}

function setMonthHeader() {

	cell = document.getElementById("month-label")
	cell.textContent = (getMonthString() + " " + dateTracker.getFullYear())

}

// Offsets the date object's current day to the day corresponding to 
// the first cell in the calendar. This is accomplished by setting it to the first
// day in the month and then decrementing the day until the getDay() value == Sunday (0)
function offsetDayToStartCell() {

	dateTracker.setDate(1)
	
	while (dateTracker.getDay() != 0) {
	
		dateTracker.setDate(dateTracker.getDate() - 1);
		
	}

}

// Fills month data based on the current date object's properties
function fillCalendarData() {	
	
	var onCurrent = onCurrentMonth();
	
	// Remove today id if moving from today's month to a different month
	if ($("#today").length > 0 && !onCurrent) $("#today").removeAttr("id")
	
	setMonthHeader();
	
	offsetDayToStartCell();	
	
	$("#calendar tbody td").each(function() {
	
		$(this).text(dateTracker.getDate());
	
		// Mark today's cell with the today id so it is highlighted
		if (dateTracker.getDate() == currentDay && onCurrent)
			$(this).attr("id", "today");
		
		// Increase the date object's current day
		dateTracker.setDate(dateTracker.getDate() + 1);
		
	});
	
	// Get the date object back to the current month since it bleeds into the next month when printing
	decreaseMonth();
	
}

function jumpToDate() {
	dateTracker.setMonth($("#selectMonth").val());
	dateTracker.setYear($("#selectYear").val());
}

