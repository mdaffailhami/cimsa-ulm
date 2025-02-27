import 'bootstrap/dist/css/bootstrap.min.css';
import 'aos/dist/aos.css';
import '@fortawesome/fontawesome-free/css/all.min.css';
import Aos from 'aos';
import { lazy, StrictMode, Suspense } from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router';
import Footer from './Footer';
import Navbar from './Navbar';
import { Global, css } from '@emotion/react';
import { CimsaStateProvider } from './states/Cimsa';
import { HelmetProvider } from 'react-helmet-async';
import { ErrorBoundary } from 'react-error-boundary';
import LoadingPage from './components/LoadingPage';

// Lazy load pages for code splitting
const NotFoundPage = lazy(() => import('./404'));
const AboutUsPage = lazy(() => import('./app/about-us/AboutUsPage'));
const HomePage = lazy(() => import('./app/home/HomePage'));
const ContactUsPage = lazy(() => import('./app/contact-us/ContactUsPage'));
const AlumniSeniorPage = lazy(() =>
  import('./app/alumni-senior/AlumniSeniorPage')
);
const ProgramsPage = lazy(() => import('./app/programs/ProgramsPage'));
const OfficialsPage = lazy(() => import('./app/officials/OfficialsPage'));
const AboutIFMSAPage = lazy(() => import('./app/about-ifmsa/AboutIFMSAPage'));
const TrainingsPage = lazy(() => import('./app/trainings/TrainingsPage'));
const ActivitiesPage = lazy(() => import('./app/activities/ActivitiesPage'));
const BlogPage = lazy(() => import('./app/blog/BlogPage'));
const PostDetailPage = lazy(() => import('./app/blog/detail/PostDetailPage'));
const ScosPage = lazy(() => import('./app/scos/ScosPage'));
const ScoDetailPage = lazy(() => import('./app/scos/detail/ScoDetailPage'));

createRoot(document.getElementById('app')).render(<App />);

function App() {
  // Initialize AOS
  Aos.init();

  return (
    <StrictMode>
      <GlobalStyle />
      <HelmetProvider>
        <BrowserRouter>
          <Navbar />
          <CimsaStateProvider>
            <Suspense fallback={<LoadingPage />}>
              <Routes>
                <Route index element={<HomePage />} />
                <Route path='landing' element={<Navigate to='/' replace />} />
                <Route path='blog' element={<BlogPage />} />
                <Route path='blog/detail/:slug' element={<PostDetailPage />} />
                <Route path='blog/:category' element={<BlogPage />} />
                <Route path='blog/:category/:page' element={<BlogPage />} />
                <Route path='about-us' element={<AboutUsPage />} />
                <Route path='about-ifmsa' element={<AboutIFMSAPage />} />
                <Route path='scos' element={<ScosPage />} />
                <Route
                  path='scos/:name'
                  element={
                    <ErrorBoundary fallback={<Navigate to='/scos' replace />}>
                      <ScoDetailPage />
                    </ErrorBoundary>
                  }
                />
                <Route path='activities' element={<ActivitiesPage />} />
                <Route path='programs' element={<ProgramsPage />} />
                <Route path='trainings' element={<TrainingsPage />} />
                <Route path='officials' element={<OfficialsPage />} />
                <Route path='alumni-senior' element={<AlumniSeniorPage />} />
                <Route path='contact-us' element={<ContactUsPage />} />
                <Route path='*' element={<NotFoundPage />} />
              </Routes>
            </Suspense>
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

        #app {
          /* Padding for fixed top navbar */
          padding-top: 66px;

          overflow-x: hidden;
        }
      `}
    />
  );
}
