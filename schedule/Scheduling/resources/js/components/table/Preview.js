import React, { Fragment } from "react";
function Preview(props) {
    const { mon, tue, wed, thur, fri, onClick } = props;
    return (
        <Fragment>
            {mon
                ? mon.map((row, index) => (
                      <tr key={index}>
                          <td className="first">
                              <input
                                  className="form-control"
                                  type="text"
                                  name="time"
                                  placeholder={
                                      mon[index].start_time +
                                      " - " +
                                      mon[index].end_time
                                  }
                                  readOnly
                                  style={{ minWidth: "200px" }}
                              />
                          </td>
                          <td onClick={() => onClick(mon[index].id, "mon")}>
                              <p>
                                  {mon[index].subject_name
                                      ? mon[index].subject_name
                                      : ""}
                              </p>
                              <p>
                                  {mon[index].user_name
                                      ? mon[index].user_name
                                      : ""}
                              </p>
                          </td>
                          <td onClick={() => onClick(tue[index].id, "tue")}>
                              <p>
                                  {tue[index].subject_name
                                      ? tue[index].subject_name
                                      : ""}
                              </p>
                              <p>
                                  {tue[index].user_name
                                      ? tue[index].user_name
                                      : ""}
                              </p>
                          </td>
                          <td onClick={() => onClick(wed[index].id, "wed")}>
                              <p>
                                  {wed[index].subject_name
                                      ? wed[index].subject_name
                                      : ""}
                              </p>
                              <p>
                                  {wed[index].user_name
                                      ? wed[index].user_name
                                      : ""}
                              </p>
                          </td>
                          <td onClick={() => onClick(thur[index].id, "thur")}>
                              <p>
                                  {thur[index].subject_name
                                      ? thur[index].subject_name
                                      : ""}
                              </p>
                              <p>
                                  {thur[index].user_name
                                      ? thur[index].user_name
                                      : ""}
                              </p>
                          </td>
                          <td onClick={() => onClick(fri[index].id, "fri")}>
                              <p>
                                  {fri[index].subject_name
                                      ? fri[index].subject_name
                                      : ""}
                              </p>
                              <p>
                                  {fri[index].user_name
                                      ? fri[index].user_name
                                      : ""}
                              </p>
                          </td>
                      </tr>
                  ))
                : "loading ...."}
        </Fragment>
    );
}
export default Preview;
