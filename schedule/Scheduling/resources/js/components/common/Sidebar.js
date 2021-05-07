import React, { useState, useEffect } from "react";
import axios from "axios";
import AddForm from "../forms/AddForm";
import PreviewForm from "../forms/PreviewForm";
import MutationForm from "../forms/MutationForm";
import EditTable from "../table/EditTable";
import Preview from "../table/Preview";
import { useAlert } from "react-alert";
const DATAURL = "/timeTable/form";
const Sidebar = props => {
    const {
        onAddFormSubmit,
        onAddFormChange,
        onPreviewFormChange,
        form,
        preview,
        onEditSchedule,
        onDeleteSchedule,
        editing,
        current
    } = props;
    const [data, setData] = useState(null);
    const alert = useAlert();
    const fetchData = async () => {
        try {
            const res = await axios.get(DATAURL);
            setData(res.data);
        } catch (error) {
            const { status } = error.response;
            alert.error(`Oop! an error occured status: ${status}`);
        }
    };
    const renderHeading = () => {
        if (preview) {
            return "Preview Form";
        } else if (editing) {
            return "Editing Form";
        } else {
            return "Add Form";
        }
    };
    const renderForm = () => {
        if (preview) {
            return (
                <PreviewForm
                    form={form}
                    data={data}
                    onChange={onPreviewFormChange}
                />
            );
        } else if (editing) {
            return (
                <MutationForm
                    current={current}
                    data={data}
                    onDelete={onDeleteSchedule}
                    onEdit={onEditSchedule}
                />
            );
        } else {
            return (
                <>
                    {data ? (
                        <AddForm
                            data={data}
                            onSubmit={onAddFormSubmit}
                            onChange={onAddFormChange}
                            form={form}
                            edit
                        />
                    ) : (
                        "Loading..."
                    )}
                </>
            );
        }
    };
    useEffect(() => {
        fetchData();
    }, []);

    return (
        <div>
            <div className="alert alert-info">
                <h4 style={{ textAlign: "center" }}>{renderHeading()}</h4>
            </div>
            {renderForm()}
        </div>
    );
};
export default Sidebar;
