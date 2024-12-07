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
                    Calendrier
                </h2>
            </div>
            <div class="flex-1 text-white flex justify-end">
                <button id="openModalBtnUser"
                    class="w-[12rem] h-[40px] rounded-[8px] bg-[linear-gradient(90deg,#9EAFCE,#697C9B)] relative flex flex-row p-2 box-sizing-border hover:bg-[linear-gradient(90deg,#697C9B,#9EAFCE)] transition duration-300 ease-in-out transform hover:scale-105">
                    <span class="m-auto inline-block break-words font-['Inter'] font-medium text-[12px] text-[#FFFFFF]">
                        Ajouter un évenement +
                    </span>
                </button>
            </div>
        </div>

        <!-- Second layout -->

        <div class="w-full rounded-lg flex-col bg-slate-800 box-sizing-border">
            <!-- Left Section (Calendar with Month and Year Select) -->
            <div class="flex-3/5 flex flex-col bg-white rounded-[20px] shadow-md items-center">
                <div class="m-5">
                    <!-- Month Select Dropdown -->
                    <select id="selectMonth" class="mx-7 px-5 py-2 rounded-lg font-semibold text-[14px] text-[#3C4C7C]"
                        style="background-color: #e3e6eb;">
                        <option value="0">Janvier</option>
                        <option value="1">Février</option>
                        <option value="2">Mars</option>
                        <option value="3">Avril</option>
                        <option value="4">Mai</option>
                        <option value="5">Juin</option>
                        <option value="6">Juillet</option>
                        <option value="7">Août</option>
                        <option value="8">Septembre</option>
                        <option value="9">Octobre</option>
                        <option value="10">Novembre</option>
                        <option value="11">Décembre</option>
                    </select>

                    <!-- Year Select Dropdown (populated dynamically) -->
                    <select id="selectYear" class="mx-7 px-5 py-2 rounded-lg font-semibold text-[14px] text-[#3C4C7C]"
                        style="background-color: #e3e6eb;"></select>
                </div>

                <!-- Calendar Container -->
                <div id="calendar" class="h-[700px] w-[700px]"></div>
            </div>
            <div id="eventList" class="flex-col bg-white p-6 rounded-[20px] shadow-md ml-4 h-[600px]">
                <!-- Fetched events will be injected here -->
            </div>
        </div>

        <!-- Right Section (Optional - Additional Content) -->
        {{-- <div class="flex-grow bg-white p-6 rounded-[20px] shadow-md ml-4 h-[600px]">
                <!-- Placeholder for any content you may want to add -->
                 <div class="flex flex-row justify-between">
                    <h2
                        class="mb-6 inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                        {{ $today_dayName }} <!-- e.g., "mercredi" -->
                    </h2>
                    <h2
                        class="mb-6 inline-block self-start break-words font-['Inter'] font-semibold text-[14px] text-[#3C4C7C]">
                        {{ $today_day }} <!-- e.g., "25 septembre 2024" -->
                    </h2>

                </div>

                <!-- Image taking full width -->
                focus on this part
                <div class=" m-[0_0_28px_0] w-[300px] h-[0px]"></div>
                {{-- {{ $today }} --}}
        {{-- @foreach ($events as $event)
                    {{-- {{ $event }}
                    <div class="flex flex-row items-center m-3 justify-between">
                        <div class="flex flex-col flex-2/3 p-2 font-medium text-[12px] text-[#6F7D93]">
                            <p>{{ $event->title }}</p>
                            <p>
                                {{ $event->formatted_start }} - {{ $event->formatted_end }}
                            </p>
                            {{-- <p>{{ $event->start }} - {{ $event->end }}</p>
                        </div>
                        <button id="openModalUpdateEvent" data-id="{{ $event->id }}" data-title="{{ $event->title }}"
                            data-start="{{ $event->start }}" data-end="{{ $event->end }}" data-note="{{ $event->note }}"
                            class="edit-button">
                            <img src="{{ asset('assets/images/edit_57.png') }}" class="w-[12px] h-[12px]" alt="Edit icon">
                        </button>
                    </div>
                @endforeach


            </div>

            </div> --}}



        <!-- Modal structure -->
        <!-- Create Modal -->
        <div id="eventModal" class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
            @include('components.events.event-modal', [
                'action' => route('events.store'),
                'submitText' => 'Ajouter',
                'modalTitle' => 'Ajouter un évenement',
                'isUpdate' => false,
                'residenceId' => $residence,
            ])
        </div>


        <!-- Event Update Modal -->
        <!-- Update Modal -->
        <div id="eventUpdateModal"
            class="fixed z-50 inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
            {{-- @if (isset($event) && @empty($event)) --}}
            {{-- {{ $event ? $event : null }} --}}
            @include('components.events.event-modal', [
                // 'action' => $event ? route('events.update', $event) : null,
                'action' => route('events.store'),

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

                // Open Create Modal
                document.getElementById('openModalBtnUser').addEventListener('click', function() {
                    document.getElementById('eventModal').classList.remove('hidden');
                });

                // Check if the calendar element is found
                if (!calendarEl) {
                    console.error('Calendar element not found');
                    return;
                }
                var residenceId = {{ $residence }};
                console.log("residence Id = ", residenceId);
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
                    eventColor: '#3C4C7C', // Default color for events
                    eventDisplay: 'block', // Show as block (bar-like)
                    displayEventTime: false, // Hide event start time
                    displayEventEnd: false, // Hide event end time
                    editable: false, // Prevent dragging or resizing events

                    // Rounded corners and height adjustment
                    eventDidMount: function(info) {
                        info.el.style.height = '10px'; // Set height of event bars
                        info.el.style.borderRadius = '10px'; // Rounded corners
                    },

                    // Styling for today’s date
                    dayCellDidMount: function(info) {
                        if (info.date.getDate() === new Date().getDate() &&
                            info.date.getMonth() === new Date().getMonth() &&
                            info.date.getFullYear() === new Date().getFullYear()) {
                            info.el.classList.add('fc-day-today'); // Default class for today
                            info.el.style.backgroundColor = '#9eafce'; // Highlight today’s date
                        }
                    },
                    // Fetch events from the backend, passing the residence_id as a query parameter
                    events: function(info, successCallback, failureCallback) {
                        fetch('/events?residence_id=' + residenceId)
                            .then(response => response.json())
                            .then(events => successCallback(events))
                            .catch(error => failureCallback(error));
                    },

                    // Function to handle date selection
                    select: function(info) {
                        var selectedDate = info.startStr; // Get selected date in ISO format
                        fetchEvents(selectedDate,residenceId); // Call your event fetching logic
                        calendar.unselect(); // Unselect after action
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



                // Function to fetch and log events starting on the selected date
                function fetchEvents(date = null, residenceId = null) {
                    const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
                    if (!csrfTokenMeta) {
                        console.error('CSRF token meta tag not found!');
                        return;
                    }

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

                    fetch('/events/fetch-by-date', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfTokenMeta.getAttribute('content')
                            },
                            body: JSON.stringify({
                                date: selectedDate.toISOString().split('T')[
                                0], // Send date in YYYY-MM-DD format
                                residence_id: residenceId // Include the residence_id if provided
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(events => {
                            console.log('Events starting on ' + selectedDate.toISOString().split('T')[0] + ':',
                                events);

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

                            // Iterate over the events and create HTML content
                            events.forEach(event => {
                                const eventHTML = `
                <div class="flex flex-row items-center m-3 justify-between">
                    <div class="flex flex-col flex-2/3 p-2 font-medium text-[12px] text-[#6F7D93]">
                        <p>${event.title}</p>
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
                        })
                        .catch(error => {
                            console.error('Error fetching events:', error);
                        });
                }




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
                            document.getElementById('note_update').value = note;

                            // Set the hidden input values initially
                            document.getElementById('start_hidden_update').value = start;
                            document.getElementById('end_hidden_update').value = end;

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



                // Render the calendar
                calendar.render();

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
