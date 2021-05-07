import React from "react";
const Notification = props => {
    const { schedule } = props;
    return (
        <>
            {schedule.length > 0 ? (
                <h4 className="text-center">{`Number of period(s): ${
                    schedule.length
                } periods`}</h4>
            ) : null}
        </>
    );
};
export default Notification;
