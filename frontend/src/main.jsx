import 'bootstrap/dist/css/bootstrap.min.css';
import 'aos/dist/aos.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import Aos from 'aos';
import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Route, Routes } from 'react-router';
import NotFoundPage from './404';
import AboutUsPage from './app/about-us/AboutUsPage';
import HomePage from './app/home/HomePage';
import Footer from './Footer';
import Navbar from './Navbar';
import Logo from './assets/Logo';
import { Global, css } from '@emotion/react';
import ContactUsPage from './app/contact-us/ContactUsPage';
import AlumniSeniorPage from './app/alumni-senior/AlumniSeniorPage';
import ProgramsPage from './app/programs/ProgramsPage';
import OfficialsPage from './app/officials/OfficialsPage';
import AboutIFMSAPage from './app/about-us/ifmsa/AboutIFMSAPage';
import TrainingsPage from './app/trainings/TrainingsPage';
import ActivitiesPage from './app/activities/ActivitiesPage';
import BlogPage from './app/blog/BlogPage';
import PostDetailPage from './app/blog/detail/PostDetailPage';
import ScosPage from './app/scos/ScosPage';
import ScoDetailPage from './app/scos/detail/ScoDetailPage';
import { CimsaStateProvider } from './states/Cimsa';
import { HelmetProvider } from 'react-helmet-async';
import { PageMeta } from './components/PageMeta';

createRoot(document.getElementById('app')).render(<App />);

function App() {
  // Initialize AOS
  Aos.init();

  return (
    <StrictMode>
      <GlobalStyle />
      <HelmetProvider>
        <PageMeta
          title='CIMSA ULM'
          description='CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit and non-governmental organization, that centers on the Sustainable Development Goals.'
        />
        <BrowserRouter>
          <Navbar />
          <CimsaStateProvider>
            <Routes>
              <Route index element={<HomePage />} />
              <Route path='blog' element={<BlogPage />} />
              <Route path='blog/detail/:slug' element={<PostDetailPage />} />
              <Route path='blog/:category' element={<BlogPage />} />
              <Route path='blog/:category/:page' element={<BlogPage />} />
              <Route path='about-us' element={<AboutUsPage />} />
              <Route path='about-us/ifmsa' element={<AboutIFMSAPage />} />
              <Route path='scos' element={<ScosPage />} />
              <Route path='scos/:name' element={<ScoDetailPage />} />
              <Route path='activities' element={<ActivitiesPage />} />
              <Route path='activities/programs' element={<ProgramsPage />} />
              <Route path='activities/trainings' element={<TrainingsPage />} />
              <Route path='officials' element={<OfficialsPage />} />
              <Route path='alumni-senior' element={<AlumniSeniorPage />} />
              <Route path='contact-us' element={<ContactUsPage />} />
              <Route path='*' element={<NotFoundPage />} />
            </Routes>
            <Footer />
          </CimsaStateProvider>
        </BrowserRouter>
      </HelmetProvider>
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
          overflow-x: hidden;
          font-family: Arial, sans-serif;
          background-color: #fff;
          color: #000;
          padding-top: 66px;
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
        }
      `}
    />
  );
}
