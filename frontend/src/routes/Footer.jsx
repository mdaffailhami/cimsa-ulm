import { Container, Row, Col } from 'react-bootstrap';
import Logo from '../assets/Logo';
import { Global, css } from '@emotion/react';

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
          <Row>
            <Col md={5}>
              <img
                src={Logo}
                alt='Logo'
                style={{
                  // width: '40px',
                  height: '50px',
                  marginBottom: '10px',
                }}
              />
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
                <i className='fa-solid fa-location-dot' /> 123 Main Street,
                Anytown, USA 12345
              </p>
              <p>
                <i className='fa-solid fa-phone' /> (123) 456-7890
              </p>
              <p>
                <i className='fa-solid fa-envelope' />{' '}
                <a href='mailto:info@example.com'>info@example.com</a>
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
                <li>
                  <a href='/about-cimsa'>About CIMSA</a>
                </li>
                <li>
                  <a href='/scos'>The SCOs</a>
                </li>
                <li>
                  <a href='/activities'>Activities</a>
                </li>
                <li>
                  <a>Programs</a>
                </li>
                <li>
                  <a href='/contact-us'>Contact Us</a>
                </li>
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
