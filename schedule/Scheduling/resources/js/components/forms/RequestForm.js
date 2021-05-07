import React, { useEffect, useState } from "react";
import axios from "axios";
import Input from "./Input";
import Notification from "../common/Notification";
import Period from "./Period";
import { Divider } from "@material-ui/core";
const URL = "/timeTable/schedule";
const SUBMIT_URL = "/timeTable/request/change";
const PERIOD = {
    time: "",
    venue: "",
    day: ""
};
const initialState = {
    day: "",
    subject: ""
};
const RequestForm = props => {
    const [scheduleUniqueDays, setScheduleUniqueDays] = useState([]);
    const [schedule, setSchedule] = useState([]);
    const [filteredSchedule, setFilteredSchedule] = useState(schedule);
    const [venues, setVenues] = useState([]);
    const [times, setTimes] = useState([]);
    const [filteredTimes, setFilteredTimes] = useState(times);
    const [inputform, setInputForm] = useState(initialState);
    const [periods, setPeriods] = useState({});
    const [isOpen, setIsOpen] = useState(false);
    const handleSubmit = () => {
        const temp = Object.keys(periods);
        if (temp.length > 0) {
            const res = temp.map(key => {
                var start_time = "";
                var end_time = "";
                const values = periods[key];
                const temp = times.find(
                    time => time.id === parseInt(values.time)
                );
                if (temp) {
                    var { start_time, end_time } = temp;
                }
                return {
                    ...values,
                    schedule_id: key,
                    start_time: start_time,
                    end_time: end_time
                };
            });
            submitData({ schedule: res });
        } else {
            alert("At least one period should be changed");
        }
    };
    const submitData = async data => {
        try {
            const response = await axios.post(SUBMIT_URL, data);
            setPeriods([]);
            setFilteredSchedule([]);
            alert(response.data);
        } catch (error) {
            if (error.response && error.response.data) {
                console.log(error.response.data);
            } else {
                console.log(error);
            }
        }
    };
    const handleDayChange = event => {
        const { name, value } = event;
        const filteredSchedule = schedule.filter(row => row.day === value);
        setFilteredSchedule(getUnique(filteredSchedule, "subject_id"));
        setFilteredTimes(times.filter(time => time.days === value));
        setInputForm({ ...inputform, [name]: value });
        setIsOpen(false);
        setPeriods([]);
    };
    const handlePeriodChange = schedule_id => event => {
        // const { name, value } = event;
        if (periods[schedule_id]) {
            const temp = periods[schedule_id];
            const period = { ...temp, ...event };
            setPeriods({ ...periods, [schedule_id]: period });
        } else {
            const period = { ...PERIOD, ...event };
            setPeriods({ ...periods, [schedule_id]: period });
        }
    };
    const getUnique = (arr, comp) => {
        const unique = arr
            .map(e => e[comp])

            // store the keys of the unique objects
            .map((e, i, final) => final.indexOf(e) === i && i)

            // eliminate the dead keys & store unique objects
            .filter(e => arr[e])
            .map(e => arr[e]);

        return unique;
    };
    const handleSubjectChange = event => {
        const { name, value } = event;
        const filteredSchedule = schedule.filter(
            row =>
                row.subject_id === parseInt(value) && row.day === inputform.day
        );
        setFilteredSchedule(filteredSchedule);
        setInputForm({ ...inputform, [name]: value });
        setIsOpen(true);
    };
    const getLecture = () => {
        const lecturer = document.getElementById("lecturer_id").value;
        return lecturer;
    };
    const getFetchUrl = lecturer_id => {
        const lecture = getLecture();
        return `${URL}?lecture=${lecture}`;
    };
    const fetchData = async () => {
        const url = getFetchUrl();
        try {
            const response = await axios.get(url);
            let { schedule, venues, times } = response.data;
            const uniqueScheduleByDay = getUnique(schedule, "day");
            setScheduleUniqueDays(uniqueScheduleByDay.map(schedule => schedule.day));
            setVenues(venues);
            setTimes(times);
            setSchedule(schedule);
        } catch (error) {
            console.log(error);
        }
    };
    useEffect(() => {
        fetchData();
    }, []);
    return (
        <form>
            <div className="ibox-content">
                <h2>Request Schedule Change</h2>
                <Input
                    scheduleUniqueDays={scheduleUniqueDays}
                    schedule={schedule}
                    onSubjectChange={handleSubjectChange}
                    onDayChange={handleDayChange}
                    subject={inputform.subject}
                />
                {isOpen ? <Notification schedule={filteredSchedule} /> : null}
                {isOpen
                    ? filteredSchedule.map((row, index) => (
                          <div style={{ marginBottom: "30px" }} key={index}>
                              {index + 1} Period
                              <Period
                                  venues={venues}
                                  schedule={row}
                                  times={filteredTimes}
                                  venues={venues}
                                  onPeriodChange={handlePeriodChange(
                                      row.schedule_id
                                  )}
                              />
                              <Divider />
                          </div>
                      ))
                    : null}
                <button
                    type="button"
                    className="btn btn-primary"
                    id="generate"
                    onClick={handleSubmit}
                    // disabled={schedule.length > 0 ? false : true}
                >
                    Request change
                </button>
            </div>
        </form>
    );
};
export default RequestForm;
