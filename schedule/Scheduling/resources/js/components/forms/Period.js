import React, { useState, useEffect } from "react";
import axios from "axios";
const DAYS = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
const FILTER_VENUE_URL = "/timeTable/filter-venue";
export const InitialState = {
    time: "",
    venue: "",
    day: ""
};
const Period = props => {
    const { times, schedule, onPeriodChange, venues } = props;
    const [form, setForm] = useState({
        time: schedule.time_id,
        venue: schedule.venue_id,
        day: schedule.day
    });
    const [currentVenue, setCurrentVenue] = useState(schedule.venue_id);
    const [currentTime, setCurrentTime] = useState(schedule.time_id);
    const [currentDay, setSCurrentDay] = useState(schedule.day);
    const [filteredVenue, setFilteredVenue] = useState(venues);
    const [filteredTimes, setFilteredTimes] = useState(times);
    const [filteredDays, setFilteredDays] = useState(DAYS);
    const handleScheduleChange = schedule_id => {
        console.log("Period has changed!");
    };
    const getFilterUrl = () => {
        if (form.time) {
            const { start_time, end_time } = filteredTimes.find(
                time => time.id == form.time
            );
            return `${FILTER_VENUE_URL}?start_time=${start_time}&end_time=${end_time}&day=${
                form.day ? form.day : currentDay
            }`;
        }
    };
    const filterVenue = async () => {
        try {
            const url = getFilterUrl();
            if (url) {
                const response = await axios.get(url);
                const venues = response.data.filter(
                    venue => venue.id !== currentVenue
                );
                setFilteredVenue(venues);
            }
        } catch (error) {
            if (error.response && error.response.data) {
                console.log(error.response.data);
            } else {
                console.log(error);
            }
        }
    };
    const handleChange = event => {
        const { name, value } = event.target;
        setForm({ ...form, [name]: value });
    };
    useEffect(() => {
        filterVenue();
    }, [form.time, form.day]);
    useEffect(() => {
        const { time, venue, day } = form;
        if (
            time === currentTime &&
            venue === currentVenue &&
            day === currentDay
        ) {
            return;
        }
        onPeriodChange(form);
    }, [form]);
    useEffect(() => {
        setFilteredVenue(venues.filter(venue => venue.id !== currentVenue));
        setFilteredDays(DAYS.filter(day => day !== currentDay));
        setFilteredTimes(times.filter(time => time.id !== currentTime));
    }, []);
    return (
        <>
            <div className="form-group">
                <select
                    name="time"
                    id="time"
                    className="form-control"
                    value={form.time}
                    onChange={handleChange}
                >
                    <option value={currentTime}>Change Time</option>
                    {filteredTimes.map((time, index) => (
                        <option value={time.id} key={index}>{`${
                            time.start_time
                        } - ${time.end_time}`}</option>
                    ))}
                </select>
            </div>
            <div className="form-group">
                <select
                    name="venue"
                    className="form-control"
                    onChange={handleChange}
                    value={form.venue}
                >
                    <option value={currentVenue}>Change Venue</option>
                    {filteredVenue.map((venue, index) => (
                        <option value={venue.id} key={index}>
                            {venue.name}
                        </option>
                    ))}
                </select>
            </div>
            <div className="form-group">
                <select
                    name="day"
                    className="form-control"
                    onChange={handleChange}
                    value={form.day}
                >
                    <option value={currentDay}>Change Day</option>
                    {filteredDays.map((day, index) => (
                        <option value={day} key={index}>
                            {day}
                        </option>
                    ))}
                </select>
            </div>
        </>
    );
};
export default Period;
