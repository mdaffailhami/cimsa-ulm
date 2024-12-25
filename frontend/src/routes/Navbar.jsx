import Container from 'react-bootstrap/Container';
import { Nav, Navbar as BootstrapNavbar, NavDropdown } from 'react-bootstrap';
import Logo from '../assets/Logo';
import { css, Global } from '@emotion/react';

export default function Navbar() {
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
          <BootstrapNavbar.Brand href='/'>
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
                href='/blog'
                active={window.location.pathname.startsWith('/blog')}
              >
                Blog
              </Nav.Link>
              <NavDropdown
                title='About Us'
                active={window.location.pathname.includes('/about')}
              >
                <NavDropdown.Item
                  href='/about-us'
                  active={window.location.pathname == '/about-us'}
                >
                  About CIMSA
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  href='/about-ifmsa'
                  active={window.location.pathname == '/about-ifmsa'}
                >
                  About IFMSA
                </NavDropdown.Item>
              </NavDropdown>
              <NavDropdown
                title='The SCOs'
                active={window.location.pathname.includes('/scos')}
              >
                <NavDropdown.Item
                  href='/scos'
                  active={window.location.pathname == '/scos'}
                >
                  All SCOs
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  href='/scos/scome'
                  active={window.location.pathname == '/scos/scome'}
                >
                  SCOME
                </NavDropdown.Item>
                <NavDropdown.Item
                  href='/scos/scora'
                  active={window.location.pathname == '/scos/scora'}
                >
                  SCORA
                </NavDropdown.Item>
                <NavDropdown.Item
                  href='/scos/scorp'
                  active={window.location.pathname == '/scos/scorp'}
                >
                  SCORP
                </NavDropdown.Item>
                <NavDropdown.Item
                  href='/scos/scoph'
                  active={window.location.pathname == '/scos/scoph'}
                >
                  SCOPH
                </NavDropdown.Item>
              </NavDropdown>
              <NavDropdown
                title='What We Do'
                active={
                  window.location.pathname == '/activities' ||
                  window.location.pathname == '/programs'
                }
              >
                <NavDropdown.Item
                  href='/activities'
                  active={window.location.pathname == '/activities'}
                >
                  Activities
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  href='/programs'
                  active={window.location.pathname == '/programs'}
                >
                  Programs
                </NavDropdown.Item>
              </NavDropdown>
              <NavDropdown
                title='The Officials'
                active={window.location.pathname.startsWith('/officials')}
              >
                <NavDropdown.Item
                  href='/officials'
                  active={window.location.pathname == '/officials'}
                >
                  Current Officials
                </NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item
                  href='/officials/past'
                  active={window.location.pathname == '/officials/past'}
                >
                  Past Officials
                </NavDropdown.Item>
              </NavDropdown>
              <Nav.Link
                href='/alumni-senior'
                active={window.location.pathname == '/alumni-senior'}
              >
                Alumni & Senior
              </Nav.Link>
              <Nav.Link
                href='/contact-us'
                active={window.location.pathname == '/contact-us'}
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
