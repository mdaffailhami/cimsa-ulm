import Container from 'react-bootstrap/Container';
import { Nav, Navbar as BootstrapNavbar, NavDropdown } from 'react-bootstrap';
import Logo from '../assets/Logo';
import { css, Global } from '@emotion/react';
import { Link, useLocation } from 'react-router';

export default function Navbar() {
  const location = useLocation();

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
      <BootstrapNavbar bg='light' expand='lg' fixed='top'>
        <Container>
          <BootstrapNavbar.Brand
            as={Link}
            to='/'
            onClick={() => window.scrollTo(0, 0)}
            css={css`
              &:hover {
                transition: all 0.3s ease-in-out;
                transform: scale(1.12);
              }
              &:not(:hover) {
                transition: transform 0.3s ease-in-out;
                transform: scale(1);
              }
            `}
          >
            <img
              src={Logo}
              alt='Logo'
              style={{ width: 'auto', height: '40px' }}
            />
          </BootstrapNavbar.Brand>
          <BootstrapNavbar.Toggle aria-controls='basic-navbar-nav' />
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
                to='/blog'
                onClick={() => window.scrollTo(0, 0)}
                active={location.pathname.startsWith('/blog')}
              >
                Blog
              </Nav.Link>
              <NavDropdown
                title='About Us'
                active={location.pathname.startsWith('/about')}
              >
                <NavDropdown.Item
                  as={Link}
                  to='/about-us'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/about-us'}
                >
                  About CIMSA
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  as={Link}
                  to='/about-ifmsa'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/about-ifmsa'}
                >
                  About IFMSA
                </NavDropdown.Item>
              </NavDropdown>
              <NavDropdown
                title='The SCOs'
                active={location.pathname.startsWith('/scos')}
              >
                <NavDropdown.Item
                  as={Link}
                  to='/scos'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/scos'}
                >
                  All SCOs
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  as={Link}
                  to='/scos/scome'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/scos/scome'}
                >
                  SCOME
                </NavDropdown.Item>
                <NavDropdown.Item
                  as={Link}
                  to='/scos/scora'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/scos/scora'}
                >
                  SCORA
                </NavDropdown.Item>
                <NavDropdown.Item
                  as={Link}
                  to='/scos/scorp'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/scos/scorp'}
                >
                  SCORP
                </NavDropdown.Item>
                <NavDropdown.Item
                  as={Link}
                  to='/scos/scoph'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/scos/scoph'}
                >
                  SCOPH
                </NavDropdown.Item>
              </NavDropdown>
              <NavDropdown
                title='What We Do'
                active={
                  location.pathname === '/activities' ||
                  location.pathname === '/programs'
                }
              >
                <NavDropdown.Item
                  as={Link}
                  to='/activities'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/activities'}
                >
                  Activities
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  as={Link}
                  to='/programs'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/programs'}
                >
                  Programs
                </NavDropdown.Item>
              </NavDropdown>
              <NavDropdown
                title='The Officials'
                active={location.pathname.startsWith('/officials')}
              >
                <NavDropdown.Item
                  as={Link}
                  to='/officials'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/officials'}
                >
                  Current Officials
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  as={Link}
                  to='/officials/past'
                  onClick={() => window.scrollTo(0, 0)}
                  active={location.pathname === '/officials/past'}
                >
                  Past Officials
                </NavDropdown.Item>
              </NavDropdown>
              <Nav.Link
                as={Link}
                to='/alumni-senior'
                onClick={() => window.scrollTo(0, 0)}
                active={location.pathname === '/alumni-senior'}
              >
                Alumni & Senior
              </Nav.Link>
              <Nav.Link
                as={Link}
                to='/contact-us'
                onClick={() => window.scrollTo(0, 0)}
                active={location.pathname === '/contact-us'}
              >
                Contact Us
              </Nav.Link>
            </Nav>
          </BootstrapNavbar.Collapse>
        </Container>
      </BootstrapNavbar>
    </>
  );
}
