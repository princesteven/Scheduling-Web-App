import React, { useState, useEffect } from "react";

const AddForm = ({ data, onSubmit, onChange, form }) => {
    const { departments, venues, faculties, courses, subjects, levels } = data;
    const [filteredDepartments, setDepartments] = useState(departments);
    const [filteredVenues, setVenues] = useState(venues);
    const [filteredFaculties, setFaculties] = useState(faculties);
    const [filteredCourses, setCourses] = useState(courses);
    const [filteredSubjects, setSubjects] = useState(subjects);
    const [filteredLevels, setLevel] = useState(levels);
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
                onChange({ [name]: value });
                setCourses(
                    courses.filter(course => course.department_id == value)
                );
            case "course":
                const { study_level } = form;
                setSubjects(
                    subjects.filter(
                        sub =>
                            sub.course_id === value &&
                            sub.study_level_id === study_level
                    )
                );
                onChange({ [name]: value });
            case "study_level":
                const { course } = form;
                setSubjects(
                    subjects.filter(
                        sub =>
                            sub.course_id === course &&
                            sub.study_level_id === value
                    )
                );
                onChange({ [name]: value });
            default:
                onChange({ [name]: value });
        }
    };
    const handleSubmit = () => {
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
            onSubmit({ ...form });
        } else {
            alert("Fill all the fields on the form");
        }
    };
    return (
        <div className="ibox-content">
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
                    <option value="">Select Department</option>
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
                    <option value="">Select Course</option>
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
                    onChange={handleChange}
                    value={form.study_level}
                >
                    <option value="">Select Study Level</option>
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
                    onChange={handleChange}
                    value={form.subject}
                >
                    <option value="">Select Subject</option>
                    {createOptions(filteredSubjects)}
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
                    <option value="">Select Lecturer</option>
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
                    <option value="">Select Venue</option>
                    {createOptions(filteredVenues)}
                </select>
            </div>
            <button
                type="button"
                className="btn btn-primary"
                id="generate"
                onClick={handleSubmit}
            >
                Create Timetable
            </button>
        </div>
    );
};
export default AddForm;
