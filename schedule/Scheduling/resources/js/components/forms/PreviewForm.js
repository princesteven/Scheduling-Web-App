import React, { useState, useEffect } from "react";

const AddForm = ({ data, onChange, form }) => {
    const { venues } = data;
    const [filteredVenues, setVenues] = useState(venues);
    const createOptions = datas => {
        return datas.map(row => (
            <option
                value={row.id}
                key={row.id}
                selected={row.id == form.venue ? true : false}
            >
                {row.name}
            </option>
        ));
    };
    const handleChange = event => {
        const { name, value } = event.target;
        onChange({ [name]: value });
    };

    return (
        <div className="ibox-content">
            <div className="form-group">
                <label className="col-form-label" htmlFor="status">
                    Venue
                </label>
                <select
                    name="venue"
                    id="venue"
                    className="form-control"
                    onChange={handleChange}
                >
                    <option value="">Select Venue</option>
                    {createOptions(filteredVenues)}
                </select>
            </div>
        </div>
    );
};
export default AddForm;
