import { Container, Row, Col } from 'react-bootstrap';
import Logo from '../assets/Logo';
import { Global, css } from '@emotion/react';
import { Link } from 'react-router';

function SocmedLink({ title, iconClass, url }) {
  return (
    <a
      href={url}
      target='_blank'
      style={{ display: 'block', marginBottom: '8px' }}
    >
      <i className={iconClass} /> {title}
    </a>
  );
}

function QuickLink({ title, url }) {
  return (
    <li>
      <Link to={url} onClick={() => window.scrollTo(0, 0)}>
        {title}
      </Link>
    </li>
  );
}

export default function Footer() {
  return (
    <>
      <Global
        styles={css`
          footer#web-footer {
            background-color: #2d2d2d;
            color: white;
            padding: 20px 0;
          }

          footer a {
            color: white;
            text-decoration: none;
          }
          footer a:hover {
            text-decoration: underline;
          }
        `}
      />
      <footer id='web-footer'>
        <Container>
          <Row
            data-aos='fade-left'
            data-aos-duration='1200'
            data-aos-once='true'
          >
            <Col md={5}>
              <Link to='/' onClick={() => window.scrollTo(0, 0)}>
                <img
                  src={Logo}
                  alt='Logo'
                  data-aos='zoom-in-right'
                  data-aos-once='true'
                  data-aos-duration='1200'
                  style={{
                    height: '50px',
                    marginBottom: '10px',
                  }}
                  css={css`
                    &:hover {
                      transition: all 0.3s ease-in-out !important;
                      transform: scale(1.1) !important;
                    }
                    &:not(:hover) {
                      transition: transform 0.3s ease-in-out !important;
                      transform: scale(1) !important;
                    }
                  `}
                />
              </Link>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed
                nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis
                ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.
                Mauris massa. Vestibulum lacinia arcu eget nulla.
              </p>
            </Col>
            <Col md={3}>
              <h5 style={{ color: 'red' }}>Contact Info</h5>
              <p>
                <Link to='/contact-us#map'>
                  <i className='fa-solid fa-location-dot' /> 123 Main Street,
                  Anytown, USA 12345
                </Link>
              </p>
              <p>
                <i className='fa-solid fa-phone' /> (123) 456-7890
              </p>
              <p>
                <Link to='/contact-us' onClick={() => window.scrollTo(0, 0)}>
                  <i className='fa-solid fa-envelope' /> info@example.com
                </Link>
              </p>
            </Col>
            <Col md={2}>
              <h5 style={{ color: 'red' }}>Follow Us</h5>
              <SocmedLink
                title='Facebook'
                iconClass='fa-brands fa-facebook'
                url='https://www.facebook.com'
              />
              <SocmedLink
                title='Twitter'
                iconClass='fa-brands fa-x'
                url='https://www.x.com'
              />
              <SocmedLink
                title='Instagram'
                iconClass='fa-brands fa-instagram'
                url='https://www.instagram.com'
              />
              <SocmedLink
                title='LinkedIn'
                iconClass='fa-brands fa-linkedin'
                url='https://www.linkedin.com'
              />
            </Col>
            <Col md={2}>
              <h5 style={{ color: 'red' }}>Quick Links</h5>
              <ul style={{ paddingLeft: 0 }}>
                <QuickLink title='Home' url='/' />
                <QuickLink title='Blog' url='/blog' />
                <QuickLink title='About Us' url='/about-us' />
                <QuickLink title='The SCOs' url='/scos' />
                <QuickLink title='The Officials' url='/officials' />
              </ul>
            </Col>
          </Row>
          <hr />
          <Row>
            <Col md={12} style={{ textAlign: 'center' }}>
              <p>
                <i className='fa-regular fa-copyright' /> 2025 - CIMSA ULM
                <br />
                All rights reserved.
              </p>
            </Col>
          </Row>
        </Container>
      </footer>
    </>
  );
}
