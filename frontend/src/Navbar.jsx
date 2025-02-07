import Container from 'react-bootstrap/Container';
import {
  Nav,
  Navbar as BootstrapNavbar,
  NavDropdown,
  Spinner,
  Alert,
} from 'react-bootstrap';
import { css, Global } from '@emotion/react';
import { Link, useLocation } from 'react-router';
import { useEffect } from 'react';
import { fetchJSON, getOnHoverAnimationCss } from './utils';
import useSWR from 'swr';
import { endpoint } from './configs';

export default function Navbar() {
  const location = useLocation();
  const scos = useSWR(
    `${endpoint}/api/committe`,
    async (url) => (await fetchJSON(url)).data
  );

  useEffect(() => {
    // If the last character of the url is '/', then remove it (Prevent trailing slash)
    if (location.pathname.match('/.*/$')) {
      window.history.replaceState(
        {},
        '',
        location.pathname.replace(/\/+$/, '') + location.search
      );
    }

    // Scroll to top instantly when location changes
    window.scrollTo({ top: 0, behavior: 'instant' });

    // Close navbar toggler when location changes if it's open
    const navbarToggler = document.getElementById('navbar-toggler');
    if (!navbarToggler) return;
    if (navbarToggler.classList.contains('collapsed')) return;
    navbarToggler.click();
  }, [location]);

  return (
    <>
      <Global
        styles={css`
          .navbar-nav .nav-link:hover,
          .navbar-nav .nav-link.active,
          .navbar-nav .dropdown-menu a:hover,
          .navbar-nav .dropdown-menu a.active {
            color: red;
            background-color: #f8f9fa;
          }
        `}
      />
      <header>
        <BootstrapNavbar bg='light' expand='lg' fixed='top'>
          <Container>
            <BootstrapNavbar.Brand
              as={Link}
              to='/'
              css={getOnHoverAnimationCss(1.12)}
            >
              <img
                src={'logo.png'}
                alt='CIMSA ULM'
                style={{ width: 'auto', height: '40px' }}
              />
            </BootstrapNavbar.Brand>
            <BootstrapNavbar.Toggle
              id='navbar-toggler'
              aria-controls='basic-navbar-nav'
            />
            <BootstrapNavbar.Collapse id='basic-navbar-nav'>
              <Nav
                className='ms-auto'
                css={css`
                  font-weight: bold;
                  gap: 4px;

                  @media (min-width: 768px) {
                    gap: 6px;
                  }

                  @media (min-width: 1200px) {
                    gap: 10px;
                  }
                `}
              >
                <div
                  css={css`
                    height: 12px;
                    @media (min-width: 992px) {
                      display: none;
                    }
                  `}
                />
                <Nav.Link
                  as={Link}
                  to='/blog/all/1'
                  active={location.pathname.startsWith('/blog')}
                >
                  Blog
                </Nav.Link>
                <NavDropdown
                  title='About Us'
                  active={
                    location.pathname === '/about-us' ||
                    location.pathname === '/about-ifmsa'
                  }
                  onMouseEnter={(e) => {
                    if (!e.target.classList.contains('show')) {
                      e.target.click();
                    }
                  }}
                  onMouseLeave={(e) => {
                    if (e.target.classList.contains('show')) {
                      e.target.click();
                    }
                  }}
                >
                  <NavDropdown.Item
                    as={Link}
                    to='/about-us'
                    active={location.pathname === '/about-us'}
                  >
                    About CIMSA
                  </NavDropdown.Item>
                  <NavDropdown.Divider />
                  <NavDropdown.Item
                    as={Link}
                    to='/about-ifmsa'
                    active={location.pathname === '/about-ifmsa'}
                  >
                    About IFMSA
                  </NavDropdown.Item>
                </NavDropdown>
                <NavDropdown
                  title='The SCOs'
                  active={location.pathname.startsWith('/scos')}
                  onMouseEnter={(e) => {
                    if (!e.target.classList.contains('show')) {
                      e.target.click();
                    }
                  }}
                  onMouseLeave={(e) => {
                    if (e.target.classList.contains('show')) {
                      e.target.click();
                    }
                  }}
                >
                  <NavDropdown.Item
                    as={Link}
                    to='/scos'
                    active={location.pathname === '/scos'}
                  >
                    All SCOs
                  </NavDropdown.Item>
                  <NavDropdown.Divider />
                  {(() => {
                    if (scos.isLoading) {
                      return (
                        <NavDropdown.Item disabled>
                          <Spinner animation='border' size='sm' />
                        </NavDropdown.Item>
                      );
                    }

                    if (scos.error) {
                      return (
                        <NavDropdown.Item disabled>
                          <Alert variant='danger'>Failed to load SCOs</Alert>
                        </NavDropdown.Item>
                      );
                    }

                    return scos.data.map((sco, i) => (
                      <NavDropdown.Item
                        key={i + 1}
                        as={Link}
                        to={`/scos/${sco.name.toLowerCase()}`}
                        active={
                          location.pathname ===
                          `/scos/${sco.name.toLowerCase()}`
                        }
                      >
                        {sco.name}
                      </NavDropdown.Item>
                    ));
                  })()}
                </NavDropdown>
                <NavDropdown
                  title='What We Do'
                  active={
                    location.pathname === '/activities' ||
                    location.pathname === '/programs' ||
                    location.pathname === '/trainings'
                  }
                  onMouseEnter={(e) => {
                    if (!e.target.classList.contains('show')) {
                      e.target.click();
                    }
                  }}
                  onMouseLeave={(e) => {
                    if (e.target.classList.contains('show')) {
                      e.target.click();
                    }
                  }}
                >
                  <NavDropdown.Item
                    as={Link}
                    to='/activities'
                    active={location.pathname === '/activities'}
                  >
                    Activities
                  </NavDropdown.Item>
                  <NavDropdown.Divider />
                  <NavDropdown.Item
                    as={Link}
                    to='/programs'
                    active={location.pathname === '/programs'}
                  >
                    Programs
                  </NavDropdown.Item>
                  <NavDropdown.Item
                    as={Link}
                    to='/trainings'
                    active={location.pathname === '/trainings'}
                  >
                    Trainings
                  </NavDropdown.Item>
                </NavDropdown>
                <Nav.Link
                  as={Link}
                  to='/officials'
                  active={location.pathname === '/officials'}
                >
                  The Officials
                </Nav.Link>
                <Nav.Link
                  as={Link}
                  to='/alumni-senior'
                  active={location.pathname === '/alumni-senior'}
                >
                  Alumni & Senior
                </Nav.Link>
                <Nav.Link
                  as={Link}
                  to='/contact-us'
                  //
                  active={location.pathname === '/contact-us'}
                >
                  Contact Us
                </Nav.Link>
              </Nav>
            </BootstrapNavbar.Collapse>
          </Container>
        </BootstrapNavbar>
      </header>
    </>
  );
}
