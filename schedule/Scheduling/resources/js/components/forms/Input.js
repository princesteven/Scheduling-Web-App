import React, { useState, useEffect } from "react";

const Days = [
    { name: "Monday" },
    { name: "Tuesday" },
    { name: "Wednesday" },
    { name: "Thursday" },
    { name: "Friday" }
];
const Input = props => {
    const {
        scheduleUniqueDays,
        schedule,
    } = props;
    const [filteredDays, setFilteredDays] = useState([]);
    const [day, setDay] = useState();
    const [selectedDay, setSelectedDay] = useState("");
    const [selectedSubject, setSelectedSubject] = useState("");
    const [filteredSchedule, setFilteredSchedule] = useState(schedule)
    // const [subject,setSubject]
    const handleDayChange = event => {
        const { name, value } = event.target;
        const filteredSchedule = schedule.filter(
            subject => subject.day === value
        );
        setFilteredSchedule(getUnique(filteredSchedule, "subject_id"))
        setSelectedDay(value);
        setSelectedSubject("");
        props.onDayChange(event.target);
    };
    const handleSubjectChange = event => {
        const { value } = event.target;
        setSelectedSubject(value);
        props.onSubjectChange(event.target);
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
    useEffect(() =>{
      setFilteredDays(Days.filter(function(item){
        return scheduleUniqueDays.indexOf(item.name) !== -1
    }))
    })
    return (
        <>
            <div className="form-group">
                <label className="col-form-label" htmlFor="price">
                    Day
                </label>
                <select
                    name="day"
                    id="day"
                    onChange={handleDayChange}
                    value={selectedDay}
                    className="form-control"
                >
                    <option value="">Select Day</option>
                    {filteredDays.map((item, index) => (
                        <option value={item.name} key={index}>
                            {item.name}
                        </option>
                    ))}
                </select>
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="price">
                    Subject
                </label>
                <select
                    name="subject"
                    id="subject"
                    onChange={handleSubjectChange}
                    value={selectedSubject}
                    className="form-control"
                >
                    <option value="">Select Subject</option>
                    {filteredSchedule.map((subject, index) => (
                        <option value={subject.subject_id} key={index}>
                            {subject.subject_name}
                        </option>
                    ))}
                </select>
            </div>
        </>
    );
};
export default Input;
