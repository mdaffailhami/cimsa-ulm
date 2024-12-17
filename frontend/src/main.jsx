import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import "./index.css";
import App from "./App.jsx";
import { BrowserRouter, Route, Routes } from "react-router";
import NotFoundPage from "./routes/NotFoundPage.jsx";
import AboutUsPage from "./routes/about-us/AboutUsPage.jsx";

createRoot(document.getElementById("root")).render(
    <StrictMode>
        <BrowserRouter>
            <Routes>
                <Route index element={<App />} />
                <Route path="about-us" element={<AboutUsPage />} />
                <Route path="*" element={<NotFoundPage />} />
            </Routes>
        </BrowserRouter>
    </StrictMode>
);
