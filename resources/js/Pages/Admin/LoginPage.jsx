import { Head, useForm } from "@inertiajs/react";
import { useEffect, useState } from "react";

const LoginPage = () => {
    const { data, setData, post, processing, errors, reset } = useForm({
        username: "",
        password: "",
        remember: false,
    });

    const submit = (e) => {
        e.preventDefault();

        post("/admin/login", {
            onFinish: () => {
                reset("username");
                reset("password");
            },
        });
    };

    return (
        <>
            <Head title="Sign In" />

            <main className="d-flex w-100">
                <div className="container d-flex flex-column">
                    <div className="row vh-100">
                        <div className="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                            <div className="d-table-cell align-middle">
                                <div className="text-center mt-4">
                                    <h1 className="h2">Welcome Back 🥳</h1>
                                    <p className="lead">
                                        Sign in to your account to access the
                                        dashboard
                                    </p>
                                </div>

                                <div className="card">
                                    <div className="card-body">
                                        <div className="m-sm-4">
                                            <form onSubmit={submit}>
                                                <div className="mb-3">
                                                    <label className="form-label">
                                                        Username
                                                    </label>
                                                    <input
                                                        className={`form-control form-control-lg ${
                                                            errors.credential &&
                                                            "is-invalid"
                                                        }`}
                                                        type="text"
                                                        name="username"
                                                        placeholder="Enter your username"
                                                        autoComplete="off"
                                                        onChange={(e) =>
                                                            setData(
                                                                "username",
                                                                e.target.value
                                                            )
                                                        }
                                                    />

                                                    {errors.credential && (
                                                        <div className="invalid-feedback">
                                                            Your credentials is
                                                            invalid
                                                        </div>
                                                    )}
                                                </div>

                                                <div className="mb-3">
                                                    <label className="form-label">
                                                        Password
                                                    </label>
                                                    <input
                                                        className={`form-control form-control-lg ${
                                                            errors.credential &&
                                                            "is-invalid"
                                                        }`}
                                                        type="password"
                                                        name="password"
                                                        placeholder="Enter your password"
                                                        onChange={(e) =>
                                                            setData(
                                                                "password",
                                                                e.target.value
                                                            )
                                                        }
                                                    />

                                                    {errors.credential && (
                                                        <div className="invalid-feedback">
                                                            Your credentials is
                                                            invalid
                                                        </div>
                                                    )}
                                                </div>

                                                <div className="text-center mt-3 ">
                                                    <button
                                                        type="submit"
                                                        className="btn btn-lg btn-primary container"
                                                    >
                                                        Login
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </>
    );
};

export default LoginPage;
