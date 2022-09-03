import React from "react";
import { Link } from "@inertiajs/inertia-react";

const OAuthLogin = () => {
    return (
        <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <a
                href="/auth/github/redirect"
                className="bg-black text-white text-xl font-bold flex justify-center items-center py-2 rounded-lg shadow-lg hover:scale-105 duration-150 hover:shadow-xl"
            >
                <img className="pr-3 h-8" src={"/icon/github.png"} />
                <div>Sign in with GitHub</div>
            </a>
            <a
                href="/auth/google/redirect"
                className="bg-white border border-gray-300 text-xl font-bold flex justify-center items-center py-2 my-6 rounded-lg shadow-lg hover:scale-105 duration-150 hover:shadow-xl"
            >
                <div>Sign in with Google</div>
            </a>
        </div>
    );
};

export default OAuthLogin;
