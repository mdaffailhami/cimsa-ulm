import 'bootstrap/dist/css/bootstrap.min.css';
import 'aos/dist/aos.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import Aos from 'aos';
import { StrictMode, useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Route, Routes, useLocation } from 'react-router';
import NotFoundPage from './routes/NotFoundPage.jsx';
import AboutUsPage from './routes/about-us/AboutUsPage.jsx';
import HomePage from './routes/home/HomePage.jsx';
import Footer from './routes/Footer.jsx';
import Navbar from './routes/Navbar.jsx';
import Logo from './assets/Logo';
import { Global, css } from '@emotion/react';
import ContactUsPage from './routes/contact-us/ContactUsPage.jsx';
import AlumniSeniorPage from './routes/alumni-senior/AlumniSeniorPage.jsx';
import ProgramsPage from './routes/programs/ProgramsPage.jsx';
import OfficialsPage from './routes/officials/OfficialsPage.jsx';
import AboutIFMSAPage from './routes/about-us/ifmsa/AboutIFMSAPage.jsx';
import TrainingsPage from './routes/trainings/TrainingsPage.jsx';
import { setPageMeta } from './utils.js';
import { endpoint } from './configs.js';

createRoot(document.getElementById('root')).render(<App />);

function App() {
  // Change web favicon
  document.head.insertAdjacentHTML(
    'beforeend',
    `<link rel="icon" href="${Logo}">`
  );

  setPageMeta(
    'CIMSA ULM',
    "Center for Indonesian Medical Students' Activities - Universitas Lambung Mangkurat"
  );

  // Initialize AOS
  Aos.init();

  const [profile, setProfile] = useState(null);
  const [socmeds, setSocmeds] = useState(null);

  useEffect(() => {
    (async () => {
      // await new Promise((resolve) => setTimeout(resolve, 3000));
      try {
        const res = await fetch(`${endpoint}/api/cimsa-profile`);
        const data = await res.json();

        setProfile(data.profile);
        setSocmeds(data.social_media);
      } catch (err) {
        console.error(err);
      }
    })();
  }, []);

  return (
    <StrictMode>
      <GlobalStyle />
      <BrowserRouter>
        <Navbar />
        <Routes>
          <Route index element={<HomePage />} />
          <Route path='about-us' element={<AboutUsPage />} />
          <Route path='about-us/ifmsa' element={<AboutIFMSAPage />} />
          <Route path='programs' element={<ProgramsPage />} />
          <Route path='trainings' element={<TrainingsPage />} />
          <Route path='officials' element={<OfficialsPage />} />
          <Route path='alumni-senior' element={<AlumniSeniorPage />} />
          <Route
            path='contact-us'
            element={<ContactUsPage socmeds={socmeds} />}
          />
          <Route path='*' element={<NotFoundPage />} />
        </Routes>
        <Footer profile={profile} socmeds={socmeds} />
      </BrowserRouter>
    </StrictMode>
  );
}

function GlobalStyle() {
  return (
    <Global
      styles={css`
        /* CSS Reset */
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        html,
        body {
          height: 100%;
          font-size: 100%;
          line-height: 1.5;
        }

        body {
          font-family: Arial, sans-serif;
          background-color: #fff;
          color: #000;
        }

        a {
          text-decoration: none;
          color: inherit;
        }

        ul,
        ol {
          list-style: none;
        }

        img {
          max-width: 100%;
          height: auto;
        }
        /* /CSS Reset */

        ::selection {
          color: white;
          background-color: red;
        }

        #root {
          /* Padding for fixed top navbar */
          padding-top: 56px;

          /* Fix right overflow */
          overflow: hidden;
        }
      `}
    />
  );
}
