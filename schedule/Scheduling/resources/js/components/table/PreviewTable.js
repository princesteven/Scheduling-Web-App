import React, { useEffect } from "react";
import Table from "./Table";
import Preview from "./Preview";
import animateScrollTo from "animated-scroll-to";
const PreviewTable = props => {
    const { data, onTableClick } = props;
    useEffect(() => {
        animateScrollTo(0);
    });
    return (
        <>
            {data ? (
                <Table>
                    <Preview {...data} onClick={onTableClick} />
                </Table>
            ) : (
                <div style={{ textAlign: "center" }}>
                    <h2>Instructions</h2>
                    <p>Select Venue</p>
                </div>
            )}
        </>
    );
};

export default PreviewTable;
