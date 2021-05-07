import React, { useState, useEffect } from "react";

const EditTimetable = props => {
    return (
        <>
            <table
                className="table table-bordered table-striped"
                style={{ marginRight: "-10px", marginTop: "8px" }}
            >
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>MONDAY</th>
                        <th>TUESDAY</th>
                        <th>WEDNESDAY</th>
                        <th>THURSDAY</th>
                        <th>FRIDAY</th>
                    </tr>
                </thead>
                <tbody>{props.children}</tbody>
                <tfoot>
                    <tr>
                        <th>Time</th>
                        <th>MONDAY</th>
                        <th>TUESDAY</th>
                        <th>WEDNESDAY</th>
                        <th>THURSDAY</th>
                        <th>FRIDAY</th>
                    </tr>
                </tfoot>
            </table>
        </>
    );
};
export default EditTimetable;
