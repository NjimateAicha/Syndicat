{{-- @extends('layouts.main')

@section('content')
  
    <x-layouts.navbar :user="Auth::user()" route="events.index"></x-layouts.navbar>
    <div class="flex flex-col w-full p-4 space-y-4">

        <!-- First layout -->
        <div class="w-full p-4 rounded-lg flex flex-row justify-between items-center">
            <!-- Content for the first layout -->
            <div class="flex-1 text-white">
                <h2 class="inline-block break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                    {{ __('Calendrier') }}
                </h2>
            </div>
            <div class="flex-1 text-white flex justify-end">
                <button id="openModalBtnUser"
                    class="w-[12rem] h-[40px] rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-2 box-sizing-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                    <span class="m-auto inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                        {{ __('Add Event') }}
                    </span>
                </button>
            </div>
        </div>

      

        <div id="eventModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
            @include('components.events.event-modal', [
                'action' => route('events.store'),
                'submitText' => __('Add'),
                'modalTitle' => __('Add Event Title'),
                'isUpdate' => false,
                'residenceId' => $residence,
            ])
        </div>



        <!-- Second layout -->

        <div class="w-full rounded-lg flex flex-row box-sizing-border">
            <!-- Left Section (Calendar with Month and Year Select) -->
            <div class=" flex flex-col bg-white rounded-[20px] shadow-md items-center">
                <div class="m-5">
                    <!-- Month Select Dropdown -->
                    <select id="selectMonth" class="mx-7 px-5 py-2 rounded-lg font-semibold text-[14px] text-[#3C4C7C]"
                        style="background-color: #e3e6eb;">
                        <option value="0">{{__('Janvier')}}</option>
                        <option value="1">{{__('Février')}}</option>
                        <option value="2">{{__('Mars')}}</option>
                        <option value="3">{{__('Avril')}}</option>
                        <option value="4">{{__('Mai')}}</option>
                        <option value="5">{{__('Juin')}}</option>
                        <option value="6">{{__('Juillet')}}</option>
                        <option value="7">{{__('Août')}}</option>
                        <option value="8">{{__('Septembre')}}</option>
                        <option value="9">{{__('Octobre')}}</option>
                        <option value="10">{{__('Novembre')}}</option>
                        <option value="11">{{__('Décembre')}}</option>
                    </select>

                    <!-- Year Select Dropdown (populated dynamically) -->
                    <select id="selectYear" class="mx-7 px-5 py-2 rounded-lg font-semibold text-[14px] text-[#3C4C7C]"
                        style="background-color: #e3e6eb;"></select>
                </div>

                <!-- Calendar Container -->
                <div id="calendar" class="h-[700px] w-[700px]"></div>
            </div>
            <div id="eventList" class="flex-grow bg-white p-6 rounded-[20px] shadow-md ml-4 h-[600px]">
                <!-- Fetched events will be injected here -->
            </div>





            <!-- Event Update Modal -->
            <!-- Update Modal -->
            <div id="eventUpdateModal"
                class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
              
                @include('components.events.event-modal', [
                    'action' => $event ? route('events.update') : null,
                    // 'action' => route('events.store'),
                    'submitText' => 'Modifier',
                    'modalTitle' => 'Modifier un évenement',
                    'isUpdate' => true,
                    'residenceId' => $residence,
                ])
               
            </div>



            <!-- FullCalendar CSS -->
            <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

            <!-- FullCalendar JS -->
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>

            <!-- FullCalendar French Language -->
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/locales/fr.js"></script>
            <script>
                // Flatpicker model
                // Initialize Flatpickr for "Create Event" modal
                function formatDateToMySQL(date) {
                    const year = date.getFullYear();
                    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                    const day = String(date.getDate()).padStart(2, '0');
                    const hours = String(date.getHours()).padStart(2, '0');
                    const minutes = String(date.getMinutes()).padStart(2, '0');
                    const seconds = String(date.getSeconds()).padStart(2, '0');

                    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                }

                flatpickr("#start", {
                    locale: "fr",
                    enableTime: true,
                    dateFormat: "d F Y H:i",
                    time_24hr: true,
                    onChange: function(selectedDates) {
                        const selectedDate = selectedDates[0];
                        const formattedDate = formatDateToMySQL(selectedDate);
                        document.getElementById('start_hidden').value = formattedDate;
                    }
                });

                flatpickr("#end", {
                    locale: "fr",
                    enableTime: true,
                    dateFormat: "d F Y H:i",
                    time_24hr: true,
                    onChange: function(selectedDates) {
                        const selectedDate = selectedDates[0];
                        const formattedDate = formatDateToMySQL(selectedDate);
                        document.getElementById('end_hidden').value = formattedDate;
                    }
                });






                // FullCalendar Initialization Script
                document.addEventListener('DOMContentLoaded', function() {
                    // Get the calendar element
                    var calendarEl = document.getElementById('calendar');

                    // Check if the calendar element is found
                    if (!calendarEl) {
                        console.error('Calendar element not found');
                        return;
                    }
                    var residenceId = {{ $residence }};
                    console.log("residence Id = ", residenceId);
                    const todayDate = new Date().toISOString().split('T')[0];

                    var allEvents = []; // To store fetched events

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        locale: 'fr', // Set language to French
                        initialView: 'dayGridMonth', // Set default view to month
                        // events: '/events', // URL to fetch events from backend
                        selectable: true, // Enable selecting dates
                        headerToolbar: false, // Hide header toolbar for cleaner look
                        height: 'auto', // Adjust calendar height dynamically

                        // Set full day names for the header
                        dayHeaderFormat: {
                            weekday: 'long'
                        },

                        // Custom styling for event display
                        eventContent: function(info) {
                            return {
                                html: '<div style="background-color:' + info.event.backgroundColor +
                                    '; height:100%;"></div>'
                            };
                        },

                        // General event settings
                        eventColor: '#3C4C7C',
                        eventDisplay: 'block',
                        displayEventTime: false,
                        displayEventEnd: false,
                        editable: false,

                        // Rounded corners and height adjustment
                        eventDidMount: function(info) {
                            info.el.style.height = '10px';
                            info.el.style.borderRadius = '10px';
                        },

                        // Styling for today’s date
                        dayCellDidMount: function(info) {
                            if (info.date.getDate() === new Date().getDate() &&
                                info.date.getMonth() === new Date().getMonth() &&
                                info.date.getFullYear() === new Date().getFullYear()) {
                                info.el.classList.add('fc-day-today');
                                info.el.style.backgroundColor = '#9eafce';
                            }
                        },

                        // Fetch events from the backend, passing the residence_id as a query parameter
                        events: function(info, successCallback, failureCallback) {
                            fetch('/calendar?residence_id=' + residenceId)
                                .then(response => response.json())
                                .then(events => {
                                    console.log('Fetched Events:', events); // Log the fetched events
                                    allEvents = events;
                                    successCallback(events); // Pass the events to the FullCalendar callback
                                    // Display today's events by default on initial load
                                    fetchEvents(todayDate);
                                })
                                .catch(error => {
                                    console.error('Error fetching events:', error); // Log any errors
                                    failureCallback(error); // Pass the error to the FullCalendar callback
                                });
                        },


                        // Function to handle date selection
                        select: function(info) {
                            var selectedDate = info.startStr;
                            fetchEvents(selectedDate);
                            calendar.unselect();
                        }
                    });

                    // Render the calendar on the page
                    calendar.render();

                    // Add custom styling via a <style> element
                    var style = document.createElement('style');
                    style.innerHTML = `
                        /* Custom styling for today's date */
                        .fc-day-today {
                            background-color: #9eafce !important;
                            color: #fff;
                        }

                        /* Styling for selected dates */
                        .fc-day-selected {
                            background-color: #9eafce !important;
                            border: 2px solid #4b5a9c;
                        }

                        .fc-col-header {
                            background-color: #e3e6eb; /* Header background to gray */
                        }

                        .fc-col-header-cell {
                            color: #6F7D93; /* Text color for weekdays */
                        }
                    `;
                    document.head.appendChild(style);



                    // Fetch and log events starting on the selected date from the pre-fetched event data
                    function fetchEvents(date = null) {
                        // If no date is provided, use the current date (today's date)
                        const selectedDate = date ? new Date(date) : new Date(); // If date is null, use today

                        // Get the day name and full formatted date for the current day (e.g., "Monday", "25 September 2024")
                        const options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        const today_dayName = selectedDate.toLocaleDateString('fr-FR', {
                            weekday: 'long'
                        }); // e.g., "lundi"
                        const today_day = selectedDate.toLocaleDateString('fr-FR', options); // e.g., "25 septembre 2024"

                        // Convert the selected date to the format YYYY-MM-DD
                        const selectedDateString = selectedDate.toISOString().split('T')[0];

                        // Filter the previously fetched events based on the selected date
                        const filteredEvents = allEvents.filter(event => {
                            const eventStart = new Date(event.start).toISOString().split('T')[0];
                            const eventEnd = new Date(event.end).toISOString().split('T')[0];

                            // Return events where the selected date is between the start and end dates
                            return selectedDateString >= eventStart && selectedDateString <= eventEnd;
                        });

                        // Format start and end times for the filtered events
                        filteredEvents.forEach(event => {
                            event.formatted_start = new Date(event.start).toLocaleTimeString('fr-FR', {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false // Use 24-hour format
                            });

                            event.formatted_end = new Date(event.end).toLocaleTimeString('fr-FR', {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false // Use 24-hour format
                            });
                        });

                        console.log('Events starting on ' + selectedDateString + ':', filteredEvents);

                        // Clear the current list of events
                        const eventList = document.getElementById('eventList');
                        eventList.innerHTML = `
                            <div class="flex flex-row justify-between">
                                <h2 class="mb-6 inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                                    ${today_dayName} <!-- e.g., "lundi" -->
                                </h2>
                                <h2 class="mb-6 inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                                    ${today_day} <!-- e.g., "25 septembre 2024" -->
                                </h2>
                            </div>
                            <div class="m-[0_0_28px_0] w-[300px] h-[0px]"></div>
                        `;

                        // Iterate over the filtered events and create HTML content
                        filteredEvents.forEach(event => {
                            const eventHTML = `
                                <div class="flex flex-row items-center m-3 justify-between">
                                    <div class="flex flex-col flex-2/3 p-2 font-medium text-[12px] text-[#6F7D93]">
                                        <p>${event.title}</p>
                                        <p>${event.id}</p>
                                        <p>${event.formatted_start} - ${event.formatted_end}</p>
                                    </div>
                                    <button data-id="${event.id}"
                                            data-title="${event.title}" data-start="${event.start}"
                                            data-end="${event.end}" data-note="${event.note}"
                                            class="edit-button">
                                        <img src="/assets/images/edit_57.png" class="w-[12px] h-[12px]" alt="Edit icon">
                                    </button>
                                </div>
                            `;

                            // Append the generated event HTML to the event list
                            eventList.innerHTML += eventHTML;
                        });

                        // Reattach event listeners for the edit buttons
                        attachModalEventListeners();
                    }








                    //?........ model logic ........?//
                    // Open Create Modal
                    document.getElementById('openModalBtnUser').addEventListener('click', function() {
                        document.getElementById('eventModal').classList.remove('hidden');
                    });

                    // Function to attach event listeners to the edit buttons for opening the update modal
                    function attachModalEventListeners() {
                        document.querySelectorAll('.edit-button').forEach(button => {
                            button.addEventListener('click', function() {
                                const title = this.getAttribute('data-title');
                                const start = this.getAttribute('data-start');
                                const end = this.getAttribute('data-end');
                                const note = this.getAttribute('data-note');

                                // Fill the update modal fields
                                document.getElementById('title_update').value = title;
                                if(note!=="null"){
                                    document.getElementById('note_update').value = note;
                                }
                                const eventId = this.getAttribute('data-id');


                                // Set the hidden input values initially
                                document.getElementById('start_hidden_update').value = start;
                                document.getElementById('end_hidden_update').value = end;
                                document.getElementById('id').value = eventId;

                                // Initialize Flatpickr and set dates
                                flatpickr("#start_update", {
                                    locale: "fr",
                                    enableTime: true,
                                    dateFormat: "d F Y H:i",
                                    time_24hr: true,
                                    defaultDate: new Date(start), // Set the start date
                                    onChange: function(selectedDates) {
                                        const selectedDate = selectedDates[0];
                                        const formattedDate = formatDateToMySQL(selectedDate);
                                        document.getElementById('start_hidden_update').value =
                                            formattedDate;
                                    }
                                });

                                flatpickr("#end_update", {
                                    locale: "fr",
                                    enableTime: true,
                                    dateFormat: "d F Y H:i",
                                    time_24hr: true,
                                    defaultDate: new Date(end), // Set the end date
                                    onChange: function(selectedDates) {
                                        const selectedDate = selectedDates[0];
                                        const formattedDate = formatDateToMySQL(selectedDate);
                                        document.getElementById('end_hidden_update').value =
                                            formattedDate;
                                    }
                                });

                                // Show the update modal
                                document.getElementById('eventUpdateModal').classList.remove('hidden');
                            });
                        });
                    }
                    fetchEvents(); // This will use today's date by default

                    // Close modals
                    document.querySelectorAll('.close-modal-btn').forEach(btn => {
                        btn.addEventListener('click', function() {
                            document.getElementById('eventModal').classList.add('hidden');
                            document.getElementById('eventUpdateModal').classList.add('hidden');
                        });
                    });


                    // // Render the calendar
                    // calendar.render();


                 
                // Dynamically populate the year select with the current year + 10 years
                var currentYear = new Date().getFullYear();
                    var selectYear = document.getElementById('selectYear');

                    // Loop to add options from current year to 10 years in the future
                    for (var i = -2; i <= 10; i++) {
                        var option = document.createElement('option');
                        option.value = currentYear + i;
                        option.text = currentYear + i;
                        selectYear.add(option);
                    }

                    // Set current month and year as the selected option
                    document.getElementById('selectMonth').value = new Date().getMonth();
                    selectYear.value = currentYear;

                    // Update calendar when month or year is selected
                    document.getElementById('selectMonth').addEventListener('change', function() {
                        updateCalendar();
                    });

                    document.getElementById('selectYear').addEventListener('change', function() {
                        updateCalendar();
                    });

                    // Function to update the calendar based on selected month and year
                    function updateCalendar() {
                        var selectedMonth = document.getElementById('selectMonth').value;
                        var selectedYear = document.getElementById('selectYear').value;

                        // Navigate the calendar to the selected month and year
                        calendar.gotoDate(new Date(selectedYear, selectedMonth));
                    }
                });
            </script>
        @endsection
     --}}





     @extends('layouts.main')

@section('content')
    {{-- navbar --}}
    {{-- @php
        dd($events);
    @endphp --}}
    <x-layouts.navbar :user="Auth::user()" route="events.index"></x-layouts.navbar>
    <div class="flex flex-col w-full p-4 space-y-4">

        <!-- First layout -->
        <div class="w-full p-4 rounded-lg flex flex-row justify-between items-center">
            <!-- Content for the first layout -->
            <div class="flex-1 text-white">
                <h2 class="inline-block break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                    {{ __('Calendrier') }}
                </h2>
            </div>
            <div class="flex-1 text-white flex justify-end">
                <button id="openModalBtnUser"
                    class="w-[12rem] h-[40px] rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-2 box-sizing-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                    <span class="m-auto inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                        {{ __('Add Event') }}
                    </span>
                </button>
            </div>
        </div>


        <div id="eventModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
            @include('components.events.event-modal', [
                'action' => route('events.store'),
                'submitText' => __('Add'),
                'modalTitle' => __('Add Event Title'),
                'isUpdate' => false,
                'residenceId' => $residence,
            ])
        </div>



        <!-- Second layout -->

        <div class="w-full rounded-lg flex flex-row box-sizing-border">
            <!-- Left Section (Calendar with Month and Year Select) -->
            <div class="flex flex-col flex-[3.5_3.5_0%] bg-white rounded-[20px] shadow-md items-center py-3">
                <div class="m-5">
                    <!-- Month Select Dropdown -->
                    <select id="selectMonth" class="mx-7 px-5 py-2 rounded-lg font-semibold text-[14px] text-[#3C4C7C]"
                        style="background-color: #e3e6eb;">
                        <option value="0">{{ __('Janvier') }}</option>
                        <option value="1">{{ __('Février') }}</option>
                        <option value="2">{{ __('Mars') }}</option>
                        <option value="3">{{ __('Avril') }}</option>
                        <option value="4">{{ __('Mai') }}</option>
                        <option value="5">{{ __('Juin') }}</option>
                        <option value="6">{{ __('Juillet') }}</option>
                        <option value="7">{{ __('Août') }}</option>
                        <option value="8">{{ __('Septembre') }}</option>
                        <option value="9">{{ __('Octobre') }}</option>
                        <option value="10">{{ __('Novembre') }}</option>
                        <option value="11">{{ __('Décembre') }}</option>
                    </select>

                    <!-- Year Select Dropdown (populated dynamically) -->
                    <select id="selectYear" class="mx-7 px-5 py-2 rounded-lg font-semibold text-[14px] text-[#3C4C7C]"
                        style="background-color: #e3e6eb;"></select>
                </div>

                <!-- Calendar Container -->
                <div id="calendar" class="h-auto w-full"></div>
            </div>
            <!-- Right Section (Event List) -->
            <div id="eventList" class="flex-[1.5_1.5_0%] bg-white p-6 rounded-[20px] shadow-md ml-4 h-[600px]">
                <!-- Fetched events will be injected here -->
            </div>





        <!-- Event Update Modal -->
        <!-- Update Modal -->
        <div id="eventUpdateModal"
            class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
            {{-- @if (isset($event) && @empty($event)) --}}
            {{-- {{ $event ? $event : null }} --}}
            @include('components.events.event-modal', [
                'action' => $event ? route('events.update') : null,
                // 'action' => route('events.store'),
                'submitText' => 'Modifier',
                'modalTitle' => 'Modifier un évenement',
                'isUpdate' => true,
                'residenceId' => $residence,
            ])
            {{-- @endif --}}
        </div>



        <!-- FullCalendar CSS -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

        <!-- FullCalendar JS -->
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js'></script>

        <!-- FullCalendar French Language -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/locales/fr.js"></script>
        <script>
            // Flatpicker model
            // Initialize Flatpickr for "Create Event" modal
            function formatDateToMySQL(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                const day = String(date.getDate()).padStart(2, '0');
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                const seconds = String(date.getSeconds()).padStart(2, '0');

                return ${year}-${month}-${day} ${hours}:${minutes}:${seconds};
            }

            flatpickr("#start", {
                locale: "fr",
                enableTime: true,
                dateFormat: "d F Y H:i",
                time_24hr: true,
                onChange: function(selectedDates) {
                    const selectedDate = selectedDates[0];
                    const formattedDate = formatDateToMySQL(selectedDate);
                    document.getElementById('start_hidden').value = formattedDate;
                }
            });

            flatpickr("#end", {
                locale: "fr",
                enableTime: true,
                dateFormat: "d F Y H:i",
                time_24hr: true,
                onChange: function(selectedDates) {
                    const selectedDate = selectedDates[0];
                    const formattedDate = formatDateToMySQL(selectedDate);
                    document.getElementById('end_hidden').value = formattedDate;
                }
            });






            // FullCalendar Initialization Script
            document.addEventListener('DOMContentLoaded', function() {
                // Get the calendar element
                var calendarEl = document.getElementById('calendar');

                // Check if the calendar element is found
                if (!calendarEl) {
                    console.error('Calendar element not found');
                    return;
                }
                var residenceId = {{ $residence }};
                console.log("residence Id = ", residenceId);
                const todayDate = new Date().toISOString().split('T')[0];

                var allEvents = []; // To store fetched events

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'fr', // Set language to French
                    initialView: 'dayGridMonth', // Set default view to month
                    // events: '/events', // URL to fetch events from backend
                    selectable: true, // Enable selecting dates
                    headerToolbar: false, // Hide header toolbar for cleaner look
                    height: 'auto', // Adjust calendar height dynamically

                    // Set full day names for the header
                    dayHeaderFormat: {
                        weekday: 'long'
                    },

                    // Custom styling for event display
                    eventContent: function(info) {
                        return {
                            html: '<div style="background-color:' + info.event.backgroundColor +
                                '; height:100%;"></div>'
                        };
                    },

                    // General event settings
                    eventColor: '#3C4C7C',
                    eventDisplay: 'block',
                    displayEventTime: false,
                    displayEventEnd: false,
                    editable: false,

                    // Rounded corners and height adjustment
                    eventDidMount: function(info) {
                        info.el.style.height = '10px';
                        info.el.style.borderRadius = '10px';
                    },

                    // Styling for today’s date
                    dayCellDidMount: function(info) {
                        if (info.date.getDate() === new Date().getDate() &&
                            info.date.getMonth() === new Date().getMonth() &&
                            info.date.getFullYear() === new Date().getFullYear()) {
                            info.el.classList.add('fc-day-today');
                            info.el.style.backgroundColor = '#9eafce';
                        }
                    },

                    // Fetch events from the backend, passing the residence_id as a query parameter
                    events: function(info, successCallback, failureCallback) {
                        fetch('/calendar?residence_id=' + residenceId)
                            .then(response => response.json())
                            .then(events => {
                                console.log('Fetched Events:', events); // Log the fetched events
                                allEvents = events;
                                successCallback(events); // Pass the events to the FullCalendar callback
                                // Display today's events by default on initial load
                                fetchEvents(todayDate);
                            })
                            .catch(error => {
                                console.error('Error fetching events:', error); // Log any errors
                                failureCallback(error); // Pass the error to the FullCalendar callback
                            });
                    },


                    // Function to handle date selection
                    select: function(info) {
                        var selectedDate = info.startStr;
                        fetchEvents(selectedDate);
                        calendar.unselect();
                    }
                });

                // Render the calendar on the page
                calendar.render();

                // Add custom styling via a <style> element
                var style = document.createElement('style');
                style.innerHTML = `
                        /* Custom styling for today's date */
                        .fc-day-today {
                            background-color: #9eafce !important;
                            color: #fff;
                        }

                        /* Styling for selected dates */
                        .fc-day-selected {
                            background-color: #9eafce !important;
                            border: 2px solid #4b5a9c;
                        }

                        .fc-col-header {
                            background-color: #e3e6eb; /* Header background to gray */
                        }

                        .fc-col-header-cell {
                            color: #6F7D93; /* Text color for weekdays */
                        }
                    `;
                document.head.appendChild(style);



                // Fetch and log events starting on the selected date from the pre-fetched event data
                function fetchEvents(date = null) {
                    // If no date is provided, use the current date (today's date)
                    const selectedDate = date ? new Date(date) : new Date(); // If date is null, use today

                    // Get the day name and full formatted date for the current day (e.g., "Monday", "25 September 2024")
                    const options = {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    const today_dayName = selectedDate.toLocaleDateString('fr-FR', {
                        weekday: 'long'
                    }); // e.g., "lundi"
                    const today_day = selectedDate.toLocaleDateString('fr-FR', options); // e.g., "25 septembre 2024"

                    // Convert the selected date to the format YYYY-MM-DD
                    const selectedDateString = selectedDate.toISOString().split('T')[0];

                    // Filter the previously fetched events based on the selected date
                    const filteredEvents = allEvents.filter(event => {
                        const eventStart = new Date(event.start).toISOString().split('T')[0];
                        const eventEnd = new Date(event.end).toISOString().split('T')[0];

                        // Return events where the selected date is between the start and end dates
                        return selectedDateString >= eventStart && selectedDateString <= eventEnd;
                    });

                    // Format start and end times for the filtered events
                    filteredEvents.forEach(event => {
                        event.formatted_start = new Date(event.start).toLocaleTimeString('fr-FR', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false // Use 24-hour format
                        });

                        event.formatted_end = new Date(event.end).toLocaleTimeString('fr-FR', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false // Use 24-hour format
                        });
                    });

                    console.log('Events starting on ' + selectedDateString + ':', filteredEvents);

                    // Clear the current list of events
                    const eventList = document.getElementById('eventList');
                    eventList.innerHTML = `
                            <div class="flex flex-row justify-between">
                                <h2 class="mb-6 inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                                    ${today_dayName} <!-- e.g., "lundi" -->
                                </h2>
                                <h2 class="mb-6 inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                                    ${today_day} <!-- e.g., "25 septembre 2024" -->
                                </h2>
                            </div>
                            <div class="m-[0_0_28px_0] w-[300px] h-[0px]"></div>
                        `;

                    // Iterate over the filtered events and create HTML content
                    filteredEvents.forEach(event => {
                        const eventHTML = `
                                <div class="flex flex-row items-center m-3 justify-between">
                                    <div class="flex flex-col flex-2/3 p-2 font-medium text-[12px] text-[#6F7D93]">
                                        <p>${event.title}</p>
                                        <p>${event.id}</p>
                                        <p>${event.formatted_start} - ${event.formatted_end}</p>
                                    </div>
                                    <button data-id="${event.id}"
                                            data-title="${event.title}" data-start="${event.start}"
                                            data-end="${event.end}" data-note="${event.note}"
                                            class="edit-button">
                                        <img src="/assets/images/edit_57.png" class="w-[12px] h-[12px]" alt="Edit icon">
                                    </button>
                                </div>
                            `;

                        // Append the generated event HTML to the event list
                        eventList.innerHTML += eventHTML;
                    });

                    // Reattach event listeners for the edit buttons
                    attachModalEventListeners();
                }








                //?........ model logic ........?//
                // Open Create Modal
                document.getElementById('openModalBtnUser').addEventListener('click', function() {
                    document.getElementById('eventModal').classList.remove('hidden');
                });

                // Function to attach event listeners to the edit buttons for opening the update modal
                function attachModalEventListeners() {
                    document.querySelectorAll('.edit-button').forEach(button => {
                        button.addEventListener('click', function() {
                            const title = this.getAttribute('data-title');
                            const start = this.getAttribute('data-start');
                            const end = this.getAttribute('data-end');
                            const note = this.getAttribute('data-note');

                            // Fill the update modal fields
                            document.getElementById('title_update').value = title;
                            if (note !== "null") {
                                document.getElementById('note_update').value = note;
                            }
                            const eventId = this.getAttribute('data-id');


                            // Set the hidden input values initially
                            document.getElementById('start_hidden_update').value = start;
                            document.getElementById('end_hidden_update').value = end;
                            document.getElementById('id').value = eventId;

                            // Initialize Flatpickr and set dates
                            flatpickr("#start_update", {
                                locale: "fr",
                                enableTime: true,
                                dateFormat: "d F Y H:i",
                                time_24hr: true,
                                defaultDate: new Date(start), // Set the start date
                                onChange: function(selectedDates) {
                                    const selectedDate = selectedDates[0];
                                    const formattedDate = formatDateToMySQL(selectedDate);
                                    document.getElementById('start_hidden_update').value =
                                        formattedDate;
                                }
                            });

                            flatpickr("#end_update", {
                                locale: "fr",
                                enableTime: true,
                                dateFormat: "d F Y H:i",
                                time_24hr: true,
                                defaultDate: new Date(end), // Set the end date
                                onChange: function(selectedDates) {
                                    const selectedDate = selectedDates[0];
                                    const formattedDate = formatDateToMySQL(selectedDate);
                                    document.getElementById('end_hidden_update').value =
                                        formattedDate;
                                }
                            });

                            // Show the update modal
                            document.getElementById('eventUpdateModal').classList.remove('hidden');
                        });
                    });
                }
                fetchEvents(); // This will use today's date by default

                // Close modals
                document.querySelectorAll('.close-modal-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.getElementById('eventModal').classList.add('hidden');
                        document.getElementById('eventUpdateModal').classList.add('hidden');
                    });
                });


                // // Render the calendar
                // calendar.render();


                // {{-- select month & year --}}
                // Dynamically populate the year select with the current year + 10 years
                var currentYear = new Date().getFullYear();
                var selectYear = document.getElementById('selectYear');

                // Loop to add options from current year to 10 years in the future
                for (var i = -2; i <= 10; i++) {
                    var option = document.createElement('option');
                    option.value = currentYear + i;
                    option.text = currentYear + i;
                    selectYear.add(option);
                }

                // Set current month and year as the selected option
                document.getElementById('selectMonth').value = new Date().getMonth();
                selectYear.value = currentYear;

                // Update calendar when month or year is selected
                document.getElementById('selectMonth').addEventListener('change', function() {
                    updateCalendar();
                });

                document.getElementById('selectYear').addEventListener('change', function() {
                    updateCalendar();
                });

                // Function to update the calendar based on selected month and year
                function updateCalendar() {
                    var selectedMonth = document.getElementById('selectMonth').value;
                    var selectedYear = document.getElementById('selectYear').value;

                    // Navigate the calendar to the selected month and year
                    calendar.gotoDate(new Date(selectedYear, selectedMonth));
                }
            });
        </script>
    @endsection