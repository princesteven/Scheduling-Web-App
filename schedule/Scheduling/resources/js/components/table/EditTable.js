import React, { useEffect } from "react";
import Table from "./Table";
import Tbody from "./Tbody";
import animateScrollTo from "animated-scroll-to";
const EditTable = props => {
    const { timetable, onCheckboxChange } = props;
    useEffect(() => {
        animateScrollTo(document.body.scrollHeight);
    });
    return (
        <>
            {timetable ? (
                <Table>
                    <Tbody
                        timetable={timetable}
                        onCheckboxChange={onCheckboxChange}
                    />
                </Table>
            ) : (
                <div style={{ textAlign: "center" }}>
                    <h2>Instructions</h2>
                    <p>
                        You can put instructions here on how to create timetable
                    </p>
                </div>
            )}
        </>
    );
};

export default EditTable;
