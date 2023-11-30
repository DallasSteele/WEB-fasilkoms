//tis but a scratch, for the ormawa smooth slide button
  // ini maggnil elemen data scrollnya
  const scrollLinks = document.querySelectorAll('[data-scroll]');

  // nambagub event listener, aoakah itu
  scrollLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();

      // Get the target element's ID from the href attribute
      const targetId = link.getAttribute('href').substring(1);

      // Get the target element by its ID
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        // Calculate the offset position to scroll to
        const offset = targetElement.getBoundingClientRect().top;

        // Scroll to the target element with smooth behavior
        window.scrollTo({
          top: window.scrollY + offset,
          behavior: 'smooth',
        });
      }
    });
  });

  function showSaranaPublikPopup() {
    clearTimeout(popupTimer);  // Clear any existing timer
    document.getElementById('saranaPublikPopup').style.display = 'block';
  }
  
  function hideSaranaPublikPopupWithDelay() {
    // Delay the hide operation by 400 milliseconds (0.4 seconds)
    popupTimer = setTimeout(function() {
      document.getElementById('saranaPublikPopup').style.display = 'none';
    }, 400);
  }
  
  function cancelSaranaPublikPopupHide() {
    clearTimeout(popupTimer);  // Clear the timer when hovering over the popup
  }
  




document.addEventListener("DOMContentLoaded", function () {
  // When the page content is ready, start the fade-out effect
  const loaderContainer = document.querySelector('.loader-container');
  loaderContainer.style.opacity = 0; // Fades out the loader container
  setTimeout(function () {
    loaderContainer.style.display = 'none'; // Hide the loader container after the animation
  }, 500); // 500 milliseconds (0.5 seconds) to complete the fade-out animation
});


// Call showLoader() when you want to show the loader, and call hideLoader() when your content is ready.



var popupTimer;  // Timer for delaying popup hide

function showPopup() {
  clearTimeout(popupTimer);  // Clear any existing timer
  document.getElementById('popup').style.display = 'block';
}

function hidePopupWithDelay() {
  // Delay the hide operation by 400 milliseconds (0.4 seconds)
  popupTimer = setTimeout(function() {
    document.getElementById('popup').style.display = 'none';
  }, 400);
}

function cancelPopupHide() {
  clearTimeout(popupTimer);  // Clear the timer when hovering over the popup
}

/**//**/

const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
const daysOfWeek = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

let currentDate = new Date();
let events = {};
// ... (existing code)

function showCalendar() {
  const monthYear = document.getElementById("month-year");
  const datesDiv = document.getElementById("dates");
  const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
  const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
  
  monthYear.innerText = monthNames[currentDate.getMonth()] + " " + currentDate.getFullYear();
  
  let calendarHTML = "";
  
  for (let i = 0; i < firstDay.getDay(); i++) {
    calendarHTML += "<div></div>";
  }
  
  for (let i = 1; i <= lastDay.getDate(); i++) {
    let selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);
    if (selectedDate.getDate() === currentDate.getDate() && selectedDate.getMonth() === currentDate.getMonth()) {
      calendarHTML += `<div class="date present-day">${i}</div>`;
    } else {
      calendarHTML += `<div class="date">${i}</div>`;
    }
  }
  
  datesDiv.innerHTML = calendarHTML;
}

showCalendar();

  

function prevMonth() {
  currentDate.setMonth(currentDate.getMonth() - 1);
  showCalendar();
}

function nextMonth() {
  currentDate.setMonth(currentDate.getMonth() + 1);
  showCalendar();
}

function addEvent() {
    const eventDate = document.getElementById("eventDate").innerText;
    const eventDetails = prompt("Enter event details:");
    
    if (eventDetails) {
      events[eventDate] = eventDetails;
      showCalendar();
    }
  }
  
  function showEventPopup(date, details) {
    const eventPopup = document.getElementById("eventPopup");
    const eventDate = document.getElementById("eventDate");
    const eventDetails = document.getElementById("eventDetails");
    
    eventDate.innerText = date;
    eventDetails.innerText = details;
    
    eventPopup.style.display = "block";
  }
  
  function hideEventPopup() {
    const eventPopup = document.getElementById("eventPopup");
    eventPopup.style.display = "none";
  }

currentDate = new Date();

// Call showCalendar to initialize with the current month and year
showCalendar();

/**/

const { google } = require('googleapis');

const initializeGoogleCalendarAPI = async () => {
  // Set up authentication
  const auth = new google.auth.GoogleAuth({
    scopes: ['https://www.googleapis.com/auth/calendar']
  });

  const authClient = await auth.getClient();

  // Set up the API client
  const calendar = google.calendar({
    version: 'v3',
    auth: authClient
  });

  return calendar;
};

const main = async () => {
  try {
    const calendarClient = await initializeGoogleCalendarAPI();

    // List events
    const events = await calendarClient.events.list({
      calendarId: 'primary',
      timeMin: (new Date()).toISOString(),
      maxResults: 10,
      singleEvents: true,
      orderBy: 'startTime'
    });

    console.log('Upcoming events:');
    events.data.items.forEach(event => {
      console.log(`- ${event.summary} (${event.start.dateTime || event.start.date})`);
    });

    // Create a new event
    const newEvent = {
      summary: 'Test Event',
      description: 'This is a test event',
      start: {
        dateTime: '2023-10-15T10:00:00Z',
        timeZone: 'America/New_York'
      },
      end: {
        dateTime: '2023-10-15T12:00:00Z',
        timeZone: 'America/New_York'
      }
    };

    const createdEvent = await calendarClient.events.insert({
      calendarId: 'primary',
      resource: newEvent
    });

    console.log('Event created:', createdEvent.data);

    // Update the event (you would use the event ID of an existing event)
    // const updatedEvent = await calendarClient.events.update({
    //   calendarId: 'primary',
    //   eventId: 'YOUR_EVENT_ID',
    //   resource: {
    //     summary: 'Updated Event Summary',
    //     description: 'Updated event description',
    //     // ... other updated event properties
    //   }
    // });

    // Delete the event (you would use the event ID of an existing event)
    // const deleteResponse = await calendarClient.events.delete({
    //   calendarId: 'primary',
    //   eventId: 'YOUR_EVENT_ID'
    // });

    console.log('Calendar operations completed.');
  } catch (error) {
    console.error('Error interacting with Google Calendar API:', error.message);
  }
};

main();







/*function buildCalendar() {
    const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  
    const calendar = document.getElementById('calendar');
    const month = document.getElementById('month');
    const weekdaysContainer = document.getElementById('weekdays');
    const daysContainer = document.getElementById('days');
  
    const now = new Date();
  
    // Remove the redeclaration of currentYear and currentMonth
    currentMonth = now.getMonth();
    currentYear = now.getFullYear();
  
    const lastDayOfMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  
    month.innerText = new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(now);
  
    for (let i = 0; i < weekdays.length; i++) {
      const weekday = document.createElement('span');
      weekday.innerText = weekdays[i];
      weekdaysContainer.appendChild(weekday);
    }
  
    for (let i = 1; i <= lastDayOfMonth; i++) {
      const dayElement = document.createElement('div');
      dayElement.innerText = i;
      dayElement.classList.add('day');
      daysContainer.appendChild(dayElement);
    }
  
    // Populate years in the dropdown
const yearSelect = document.getElementById('year');
const currentYear = new Date().getFullYear();
for (let i = currentYear; i <= currentYear + 1; i++) {
  const option = document.createElement('option');
  option.value = i;
  option.text = i;
  yearSelect.appendChild(option);
}
yearSelect.value = currentYear;  // Set default selected year

  }
  */


  function addNewContent() {
    const imageInput = document.getElementById('imageInput');
    const nameInput = document.getElementById('nameInput');
    const positionInput = document.getElementById('positionInput');
  
    const data = new FormData();
    data.append('image', imageInput.files[0]);
    data.append('name', nameInput.value);
    data.append('position', positionInput.value);
  
    fetch('/your-api-endpoint', {
      method: 'POST',
      body: data
    })
      .then(response => response.json())
      .then(data => {
        // Handle the response from the server (e.g., display a success message)
      })
      .catch(error => {
        // Handle errors (e.g., display an error message)
      });
  }

  
  const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const multer = require('multer');
const upload = multer({ dest: 'uploads/' }); // Define an upload folder

app.use(bodyParser.json());

app.post('/your-api-endpoint', upload.single('image'), (req, res) => {
  const { name, position } = req.body;
  const imageFilePath = req.file.path;

  // Insert the data into your database using a database library (e.g., Mongoose for MongoDB, or Sequelize for SQL databases).

  // Send a response to the client indicating success or failure.
  res.json({ message: 'Data inserted into the database.' });
});

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});


