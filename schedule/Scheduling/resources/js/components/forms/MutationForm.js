import React, { useState, useEffect } from "react";
import animateScrollTo from "animated-scroll-to";
import axios from "axios";
import DeleteDialog from './DeleteDialog'
import EditDialog from './EditDialog'
const initialState = {
    department: "",
    course: "",
    study_level: "",
    subject: "",
    lecturer: "",
    venue: ""
};

const MutationForm = ({ data, onDelete, current, onEdit }) => {
    const { departments, venues, faculties, courses, subjects, levels } = data;
    const [filteredDepartments, setDepartments] = useState(departments);
    const [filteredVenues, setVenues] = useState(venues);
    const [filteredFaculties, setFaculties] = useState(faculties);
    const [filteredCourses, setCourses] = useState(courses);
    const [filteredSubjects, setSubjects] = useState(subjects);
    const [filteredLevels, setLevel] = useState(levels);
    const [form, setForm] = useState(current);
    const [isEditing, setIsEditing] = useState(false);
    const [isDeleting, setIsDeleting] = useState(false);
    useEffect(() => {
        animateScrollTo(document.body.scrollHeight);
    });
    useEffect(() => {
        const {
            departments,
            venues,
            faculties,
            courses,
            subjects,
            levels
        } = data;
        setSubjects(
            subjects.filter(
                sub =>
                    sub.course_id == current.course &&
                    sub.study_level_id == current.study_level
            )
        );
        setCourses(
            courses.filter(coz => coz.department_id == current.department)
        );
        setDepartments(departments);
        setVenues(venues);
        setFaculties(faculties);
        setLevel(levels);
        setForm(current);
    }, [current]);
    const createOptions = datas => {
        return datas.map(row => (
            <option value={row.id} key={row.id}>
                {row.name}
            </option>
        ));
    };
    const handleChange = event => {
        const { name, value } = event.target;
        switch (name) {
            case "department":
                setForm({ ...form, [name]: value });
                setCourses(
                    courses.filter(course => course.department_id == value)
                );
                break;
            case "course":
                const { study_level } = form;
                setSubjects(
                    subjects.filter(
                        sub =>
                            sub.course_id == value &&
                            sub.study_level_id == study_level
                    )
                );
                setForm({ ...form, [name]: value });
                break;
            case "study_level":
                const { course } = form;
                setSubjects(
                    subjects.filter(
                        sub =>
                            sub.course_id == course &&
                            sub.study_level_id == value
                    )
                );
                setForm({ ...form, [name]: value });
                break;
            default:
                setForm({ ...form, [name]: value });
        }
    };
    const handleDelete = () => {
        setIsDeleting(true);
        onDelete({ ...form });
    };
    const handleEdit = () => {
        const {
            venue,
            study_level,
            subject,
            lecturer,
            department,
            course
        } = form;
        if (
            venue &&
            study_level &&
            subject &&
            lecturer &&
            department &&
            course
        ) {
            setIsEditing(true);
            onEdit({ ...form });
        } else {
            alert("Fill all the fields on the form");
        }
    };
    return (
        <div className="ibox-content">
            <div className="form-group">
                <label className="col-form-label" htmlFor="product_name">
                    Start time
                </label>
                <input
                    type="text"
                    className="form-control"
                    value={form.start_time}
                    readOnly
                />
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="product_name">
                    End time
                </label>
                <input
                    type="text"
                    className="form-control"
                    value={form.end_time}
                    readOnly
                />
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="product_name">
                    Day
                </label>
                <input
                    type="text"
                    className="form-control"
                    value={form.days}
                    readOnly
                />
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="department">
                    Department
                </label>
                <select
                    name="department"
                    className="form-control"
                    onChange={handleChange}
                    value={form.department}
                >
                    {createOptions(filteredDepartments)}
                </select>
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="product_name">
                    Course
                </label>
                <select
                    name="course"
                    className="form-control"
                    onChange={handleChange}
                    value={form.course}
                >
                    <option value="">Select course</option>
                    {createOptions(filteredCourses)}
                </select>
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="product_name">
                    Study Level
                </label>
                <select
                    name="study_level"
                    id="study_level"
                    className="form-control"
                    value={form.study_level}
                    onChange={handleChange}
                >
                    <option value="">Select study level</option>
                    {createOptions(filteredLevels)}
                </select>
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="price">
                    Subject
                </label>
                <select
                    name="subject"
                    id="subject"
                    className="form-control"
                    value={form.subject}
                    onChange={handleChange}
                >
                    <option value="">Select subject</option>
                    {createOptions(filteredSubjects, "subject")}
                </select>
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="status">
                    Lecturer
                </label>
                <select
                    name="lecturer"
                    id="lecturer"
                    className="form-control"
                    onChange={handleChange}
                    value={form.lecturer}
                >
                    <option value="">Select lecturer</option>
                    {createOptions(filteredFaculties)}
                </select>
            </div>
            <div className="form-group">
                <label className="col-form-label" htmlFor="status">
                    Venue
                </label>
                <select
                    name="venue"
                    id="venue"
                    className="form-control"
                    onChange={handleChange}
                    value={form.venue}
                >
                    <option value="">Select venue</option>
                    {createOptions(filteredVenues)}
                </select>
            </div>
            
            <EditDialog edit={handleEdit} isEditing={isEditing}></EditDialog>
            <br/>
            <DeleteDialog delete={handleDelete} isDeleting={isDeleting} />
        </div>
    );
};
export default MutationForm;
