import React, { useState, useEffect } from "react";
function Tbody(props) {
    const { timetable, onCheckboxChange } = props;
    return (
        <>
            {timetable.mon.map((row, index) => (
                <tr key={index}>
                    <td className="first">
                        <input
                            className="form-control"
                            type="text"
                            name="time"
                            placeholder={
                                timetable.mon[index].start_time +
                                " - " +
                                timetable.mon[index].end_time
                            }
                            readOnly
                            style={{ minWidth: "200px" }}
                        />
                    </td>
                    <td style={{ cursor: "pointer" }}>
                        {validate(timetable.mon[index]) ? (
                            <Checkbox
                                timeslot={timetable.mon[index].id}
                                onCheckboxChange={onCheckboxChange}
                            />
                        ) : (
                            verdict(timetable.mon[index])
                        )}
                    </td>
                    <td>
                        {validate(timetable.tue[index]) ? (
                            <Checkbox
                                timeslot={timetable.tue[index].id}
                                onCheckboxChange={onCheckboxChange}
                            />
                        ) : (
                            verdict(timetable.tue[index])
                        )}
                    </td>
                    <td>
                        {validate(timetable.wed[index]) ? (
                            <Checkbox
                                timeslot={timetable.wed[index].id}
                                onCheckboxChange={onCheckboxChange}
                            />
                        ) : (
                            verdict(timetable.wed[index])
                        )}
                    </td>
                    <td>
                        {validate(timetable.thur[index]) ? (
                            <Checkbox
                                timeslot={timetable.thur[index].id}
                                onCheckboxChange={onCheckboxChange}
                            />
                        ) : (
                            verdict(timetable.thur[index])
                        )}
                    </td>
                    <td>
                        {validate(timetable.fri[index]) ? (
                            <Checkbox
                                timeslot={timetable.fri[index].id}
                                onCheckboxChange={onCheckboxChange}
                            />
                        ) : (
                            verdict(timetable.fri[index])
                        )}
                    </td>
                </tr>
            ))}
        </>
    );
}
export default Tbody;

const Checkbox = props => {
    const { timeslot, onCheckboxChange } = props;
    return (
        <input
            type="checkbox"
            className="checkbox form-control"
            name="m[]"
            value={timeslot}
            style={{ width: "20px", height: "20px" }}
            onChange={onCheckboxChange}
        />
    );
};

const verdict = data => {
    var msg = [];
    if (!data.isVenueAvailable) {
        msg.push(`Venue is not available`);
    }
    if (!data.isLecturersAvailable) {
        msg.push(`Lecturer is not available`);
    }
    if (!data.isSubjectAvailable) {
        msg.push(`Subject is not available`);
    }
    var message = msg.map(row => <p>{row}</p>);
    return message;
};
const validate = data => {
    var isValid = false;
    if (
        data.isVenueAvailable &&
        data.isLecturersAvailable &&
        data.isSubjectAvailable
    ) {
        isValid = true;
    }
    return isValid;
};
