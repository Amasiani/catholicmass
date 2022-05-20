/*jshint esversion: 6 */ 

import axios from "axios";
import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import Church from "./Church";

function Example() {
    const [name, setName] = useState("");
    const [currentLat, setCurrentLat] = useState(null);
    const [currentLong, setCurrentLong] = useState(null);
    const [status, setStatus] = useState(null);
    const [church, setChurch] = useState([]);
    const [errorMessage, setErrorMessage] = useState("");
    const [loading, setLoading] = useState("");

    function handleChange(event) {
        setName(event.target.value);
    }

    var options = {
        enableHighAccuracy: true,
        timeout: 2000,
        maximumAge: 0,
    };

    function getLocation(Closure) {
        if (!navigator.geolocation) {
            setStatus("Geolocation is not supported by your browser");
        } else {
            setStatus("Locating...");
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    setCurrentLong(position.coords.longitude),
                        setCurrentLat(position.coords.latitude),
                        options,
                    setStatus(""),

                    Closure()
                },
                () => {
                    setStatus("Unable to retrieve your location");
                }
            );
        }
    }

    function fetchChurch() {
        setLoading("loading...");
        axios
            .get("/welcome", {
                params: {
                    name: name,
                    longitude: currentLong,
                    latitude: currentLat,
                },
            })
            .then((response) => {
                setChurch(response.data.churches);
            })
            .finally(() => {
                setLoading("");
            });
    }

    useEffect(() => {
        handleSubmit;
    }, []);

    function handleSubmit() {
        event.preventDefault();
        getLocation(() => {
            fetchChurch();
        });
    }

    const nearChurch_htmlData = church.map((item) => {
        return <Church 
                    key={item.id} 
                    {...item} 
                />;
    });

    return (
        <div className="">
            <div className="row align-items-center min-vh-25 min-vh-md-75">
                <div className="col col-lg-6 py-6 text-sm-center text-center">
                    <p className="mb-2 fs-1">Find Catholic church near you</p>
                    <form>
                        <div className="input-group w-xl-75 w-xxl-50 d-flex flex-end-center mb-1">
                            <input
                                className="form-control rounded-pill shadow-lg border-0"
                                id="name"
                                value={name}
                                onChange={handleChange}
                                name="name"
                                type="text"
                                placeholder="Search catholic church near your"
                            />
                            <img
                                className="input-box-icon me-2"
                                onClick={handleSubmit}
                                src="assets/img/illustrations/search.png"
                                width="30"
                                alt="search Icon"
                            />
                        </div>
                    </form>
                    <h4 className="fw-4">Catholic church around</h4>
                    <p>{status}</p>
                </div>
            </div> 
            <div className="row">           
                {loading && <h4>{loading}</h4>}
                {nearChurch_htmlData}
            </div>          
        </div>

    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
