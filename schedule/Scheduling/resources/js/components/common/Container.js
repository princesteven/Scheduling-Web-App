import React, { useEffect, useState } from "react";
import axios from "axios";
import Sidebar from "./Sidebar";
import EditTable from "../table/EditTable";
import PreviewTable from "../table/PreviewTable";
const CREATE_TIMETABLE = "/timeTable/items";
const DELETE_TIMETABLE = "/timeTable/delete";
const EDIT_TIMETABLE = "/timeTable/edit";
const PREVIEW_TIMETABLE = "/timeTable/preview/?venue=";
const GENERATE_TIMETABLE = "/timeTable/insertTimetable";
import { useAlert } from "react-alert";

export const initialState = {
    department: "",
    course: "",
    study_level: "",
    subject: "",
    lecturer: "",
    venue: ""
};
const Container = () => {
    const [createScheduleData, setCreateScheduleData] = useState(null);
    const [previewScheduleData, setPreviewScheduleData] = useState(null);
    const [preview, setPreview] = useState(false);
    const [editing, setEditing] = useState(false);
    const [form, setForm] = useState(initialState);
    const [current, setCurrent] = useState(null);
    const [selected, setSelected] = useState([]);
    const alert = useAlert();
    const handleChexboxChange = event => {
        const { value, checked } = event.target;
        if (checked) {
            setSelected([...selected, value]);
        } else {
            setSelected(selected.filter(prev => prev !== value));
        }
    };
    const generateTimetable = () => {
        const payload = {
            selected: selected,
            course: form.course,
            study_level: form.study_level,
            lecturer: form.lecturer,
            venue: form.venue,
            subject: form.subject,
            department: form.department
        };
        axios
            .post(GENERATE_TIMETABLE, payload)
            .then(res => {
                if (res.data === "ok") {
                    fetchCreateScheduleData(form);
                    setSelected([]);
                    setPreview(false);
                    setEditing(false);
                    alert.success("Schedule Added");
                }
            })
            .catch(err => {
                const { status } = err.response;
                alert.error(`Oop! an error occured status: ${status}`);
            });
    };
    const handleTableClick = (schedule_id, day) => {
        if (schedule_id) {
            const schedule = previewScheduleData[day].filter(
                schedule => schedule.id === schedule_id
            )[0];
            setCurrent(schedule);
            setEditing(true);
            setPreview(false);
        }
    };
    const togglePreview = () => {
        const { venue } = form;
        if (!preview && venue) {
            fetchPreviewScheduleData(venue);
        }
        setPreview(!preview);
        setEditing(false);
    };
    const handleAddFormChange = args => {
        setForm({ ...form, ...args });
    };
    const editSchedule = async args => {
        try {
            const response = await axios.post(EDIT_TIMETABLE, args);
            const { venue } = args;
            const data = response.data;
            if (data === 200) {
                setPreview(true);
                setEditing(false);
                fetchPreviewScheduleData(venue);
                fetchCreateScheduleData(args);
                setForm({ ...args });
                alert.success("Schedule edited");
            }
        } catch (error) {
            const { status } = error.response;
            alert.error(`An error occured ,status: ${status}`);
        }
    };
    const deleteSchedule = async args => {
        const { id, venue } = args;
        try {
            const response = await axios.post(DELETE_TIMETABLE, { id: id });
            const data = response.data;
            if (data === 200) {
                fetchPreviewScheduleData(venue);
                fetchCreateScheduleData(args);
                setPreview(true);
                setEditing(false);
                alert.success("Schedule deleted");
            }
        } catch (error) {
            const { status } = error.response;
            alert.error(`Oop! an errror occured status: ${status}`);
        }
    };
    const handlePreviewFormChange = args => {
        setForm({ ...form, ...args });
        fetchPreviewScheduleData(args.venue);
    };
    const fetchPreviewScheduleData = async venue_id => {
        const response = await axios.get(PREVIEW_TIMETABLE + venue_id);
        const data = response.data;
        let mon = data.filter(item => item.days === "Monday");
        let tue = data.filter(item => item.days === "Tuesday");
        let wed = data.filter(item => item.days === "Wednesday");
        let fri = data.filter(item => item.days === "Friday");
        let thur = data.filter(item => item.days === "Thursday");
        setPreviewScheduleData({
            mon: mon,
            tue: tue,
            wed: wed,
            thur: thur,
            fri: fri
        });
    };
    const fetchCreateScheduleData = async course_detail => {
        const response = await axios.get(CREATE_TIMETABLE, {
            params: course_detail
        });
        formatData(response.data);
    };
    const formatData = data => {
        const usedVenuesIds = data.usedVenues.map(venue =>
            parseInt(venue.time_id)
        );
        const usedSubjectsIds = data.allocatedSubjects.map(subject =>
            parseInt(subject.time_id)
        );
        const usedLecturersIds = data.allocatedLecturers.map(lecturer =>
            parseInt(lecturer.time_id)
        );
        const availableVenues = data.items.map(item =>
            usedVenuesIds.includes(item.id)
                ? {
                      ...item,
                      isVenueAvailable: false
                  }
                : {
                      ...item,
                      isVenueAvailable: true
                  }
        );
        const availableLecturers = availableVenues.map(item =>
            usedLecturersIds.includes(item.id)
                ? {
                      ...item,
                      isLecturersAvailable: false
                  }
                : {
                      ...item,
                      isLecturersAvailable: true
                  }
        );
        const items = availableLecturers.map(item =>
            usedSubjectsIds.includes(item.id)
                ? {
                      ...item,
                      isSubjectAvailable: false
                  }
                : {
                      ...item,
                      isSubjectAvailable: true
                  }
        );
        const timetable = {
            mon: items.filter(item => item.days === "Monday"),
            tue: items.filter(item => item.days === "Tuesday"),
            wed: items.filter(item => item.days === "Wednesday"),
            thur: items.filter(item => item.days === "Thursday"),
            fri: items.filter(item => item.days === "Friday")
        };
        setCreateScheduleData(timetable);
    };
    return (
        <div className="row">
            <div className="col-md-3">
                <Sidebar
                    onAddFormSubmit={fetchCreateScheduleData}
                    onAddFormChange={handleAddFormChange}
                    onPreviewFormChange={handlePreviewFormChange}
                    form={form}
                    preview={preview}
                    editing={editing}
                    onEditSchedule={editSchedule}
                    onDeleteSchedule={deleteSchedule}
                    current={current}
                />
            </div>
            <div className="col-md-9">
                <div className="alert alert-info">
                    Toolbar
                    <a
                        href="#"
                        className="alert-link pull-right"
                        onClick={togglePreview}
                    >
                        {preview ? "Create mode" : "Preview mode"}
                    </a>
                    {selected.length > 0 ? (
                        <a
                            href="#"
                            className="alert-link pull-right"
                            style={{ marginRight: 20 }}
                            onClick={generateTimetable}
                        >
                            SAVE
                        </a>
                    ) : null}
                </div>
                {preview || editing ? (
                    <PreviewTable
                        data={previewScheduleData}
                        onTableClick={handleTableClick}
                    />
                ) : (
                    <EditTable
                        timetable={createScheduleData}
                        onCheckboxChange={handleChexboxChange}
                    />
                )}
            </div>
        </div>
    );
};
export default Container;
